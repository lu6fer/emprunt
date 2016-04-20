<?php

namespace Emprunt\Http\Controllers\Admin;

use Emprunt\Borrow_history;
use Illuminate\Http\Request;

use Emprunt\Http\Controllers\Controller;
use Emprunt\Http\Requests;
use Validator;
use Emprunt\Tank;
use Emprunt\User;
//use Emprunt\Status;
use Emprunt\Tiv_status;
use Emprunt\Tiv;
use DB;
use Carbon;
use PDF;

/**
 * Class TankController
 * @package Emprunt\Http\Controllers\Admin
 */
class TivController extends Controller
{
    /**
     * List tivs for a tank
     * @param $tank_id
     * @return mixed
     */
    public function tivs($tank_id) {
        $tank = Tank::findOrFail($tank_id);
        $tank->load('tivs');

        return view('pages.admin.tank.tiv.list')
            ->with('tank', $tank);
    }

    /**
     * Add new tiv
     * @param $tank_id
     * @return mixed
     */
    public function add($tank_id) {
        $tank = Tank::findOrFail($tank_id);
        $reviewers = User::all();
        $previous_tiv = Tiv::where('tank_id', $tank_id)->orderBy('review_date', 'desc')->first();
        $previous_test = DB::table('tivs')
            ->select('review_date')
            ->where('tank_id', $tank_id)
            ->where('review_id', '90')
            ->orderBy('review_date', 'desc')
            ->first()
            ?: $tank->buy->date;
        if (isset($previous_test->review_date)) {
            $previous_test = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $previous_test->review_date);
        }
        $tiv_datas = [
            'ext_state' => Tiv_status::where('type', 'ext_state')->get(),
            'int_residue' => Tiv_status::where('type', 'int_residue')->get(),
            'int_state' => Tiv_status::where('type', 'int_state')->get(),
            'neck_thread' => Tiv_status::where('type', 'neck_thread')->get(),
            'neck_thread_size' => Tiv_status::where('type', 'neck_thread_size')->get(),
            'performed_maintenance' => Tiv_status::where('type', 'performed_maintenance')->get(),
            'review' => Tiv_status::where('type', 'review')->get(),
            'review_status' => Tiv_status::where('type', 'review_status')->get(),
            'todo_maintenance' => Tiv_status::where('type', 'todo_maintenance')->get(),
            'valve' => Tiv_status::where('type', 'valve')->get(),
            'valve_ring' => Tiv_status::where('type', 'valve_ring')->get(),
            'recipient' => Tiv_status::where('type', 'recipient')->get(),
            'decision' => Tiv_status::where('type', 'decision')->get()
        ];
        return view('pages.admin.tank.tiv.add')
            ->with('tank', $tank)
            ->with('reviewers', $reviewers)
            ->with('tiv_datas', $tiv_datas)
            ->with('previous_tiv', $previous_tiv)
            ->with('previous_test', $previous_test);
    }

    /**
     * Display details of tiv's tank
     * @param $tiv_id
     * @return mixed
     */
    public function detail($tiv_id) {
        $tiv = Tiv::findOrFail($tiv_id);
        $tiv->load('tank');
        return view('pages.admin.tank.tiv.detail')
            ->with('tiv', $tiv);
    }

    /**
     * @param $tiv_id
     * @param Request $request
     * @return mixed
     */
    public function edit($tiv_id, Request $request) {
        $tiv = Tiv::findOrFail($tiv_id);
        $tiv->load('tank');

        if ($tiv->review_status->id == 88 && $tiv->decision->id != 98) {
            $alert = [
                'type' => 'alert-warning',
                'msg' => 'Il est impossible d\'éditer une inspection "Terminer" et "Acceptée" ou "Refusée"'
            ];

            $request->session()->flash($alert['type'], $alert['msg']);
            return redirect('/admin/tank/tiv/'.$tiv->tank->id);
        }

        $previous_test = DB::table('tivs')
            ->select('review_date')
            ->where('tank_id', $tiv->tank->id)
            ->where('review_id', '90')
            ->orderBy('review_date', 'desc')
            ->first()
            ?: $tiv->tank->buy->date;
        if (isset($previous_test->review_date)) {
            $previous_test = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $previous_test->review_date);
        }
        $tiv_datas = [
            'ext_state'             => Tiv_status::where('type', 'ext_state')->get(),
            'int_residue'           => Tiv_status::where('type', 'int_residue')->get(),
            'int_state'             => Tiv_status::where('type', 'int_state')->get(),
            'neck_thread'           => Tiv_status::where('type', 'neck_thread')->get(),
            'neck_thread_size'      => Tiv_status::where('type', 'neck_thread_size')->get(),
            'performed_maintenance' => Tiv_status::where('type', 'performed_maintenance')->get(),
            'review'                => Tiv_status::where('type', 'review')->get(),
            'review_status'         => Tiv_status::where('type', 'review_status')->get(),
            'todo_maintenance'      => Tiv_status::where('type', 'todo_maintenance')->get(),
            'valve'                 => Tiv_status::where('type', 'valve')->get(),
            'valve_ring'            => Tiv_status::where('type', 'valve_ring')->get(),
            'recipient'             => Tiv_status::where('type', 'recipient')->get(),
            'reviewer'              => $reviewers = User::all(),
            'decision' => Tiv_status::where('type', 'decision')->get()
        ];
        return view('pages.admin.tank.tiv.edit')
            ->with('tiv', $tiv)
            ->with('tiv_datas', $tiv_datas)
            ->with('previous_test', $previous_test);
    }

    /**
     * @param $tiv_id
     * @return mixed
     */
    public function pdf($tiv_id) {
        $tiv = Tiv::findOrFail($tiv_id);
        $tiv->load('tank');
        $last_test = Tiv::where('tank_id', $tiv->tank_id)
            ->where('review_id', 90)
            ->first();
        $previous_tiv = Tiv::where('tank_id', $tiv->tank_id)
            ->where('review_date', $tiv->previous_review_date)
            ->first();
        $pdf = PDF::loadView('pages.admin.tank.tiv.pdf', compact('tiv', "previous_tiv", "last_test"));
        return $pdf->download($tiv->tank->id.'- Inspection - '.date('Y-m-d H:i:s').'.pdf');
    }

    /**
     * Save new tiv
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request) {
        $tank_id = $request->input('tank_id');

        // Validation rules
        $validator = Validator::make($request->all(), [
            'review_date'              => 'required|date_format:d/m/Y',
            'reviewer_id'              => 'required|integer',
            'review_id'                => 'required|integer',
            'review_status_id'         => 'required|integer',
            'ext_state_id'             => 'required|integer',
            'int_state_id'             => 'required|integer',
            'int_oil'                  => 'sometimes|accepted',
            'int_residue_id'           => 'required|integer',
            'valve_id'                 => 'required|integer',
            'valve_ring_id'            => 'required|integer',
            'neck_thread_id'           => 'required|integer',
            'neck_thread_size_id'      => 'required|integer',
            'todo_maintenance_id'      => 'integer',
            'performed_maintenance_id' => 'integer',
            'previous_review_date'     => 'date_format:d/m/Y',
            'next_test_date'           => 'required|date_format:d/m/Y',
            'comment'                  => 'string',
            'shipping_date'            => 'required_with:recipient_id|date_format:d/m/Y',
            'recipient_id'             => 'required_with:shipping_date|integer',
            'decision_id'              => 'required|integer'
        ]);

        // Validation errors
        if ($validator->fails()) {
            return redirect('admin/tank/tiv/add/'.$tank_id)
                ->withErrors($validator)
                ->withInput();
        }

        // Create new TIV
        $tiv = new Tiv();
        $data = $request->all();
        $data['int_oil'] = $request->input('int_oil', false) ? 1 : 0;
        $data['review_date'] = Carbon\Carbon::createFromFormat('d/m/Y', $request->input('review_date'));
        $data['next_test_date'] = Carbon\Carbon::createFromFormat('d/m/Y', $request->input('next_test_date'));
        if ($request->input('previous_review_date', false)) {
            $data['previous_review_date'] = Carbon\Carbon::createFromFormat('d/m/Y', $request->input('previous_review_date'));
        }
        if ($request->input('shipping_date', false)) {
            $data['shipping_date'] = Carbon\Carbon::createFromFormat('d/m/Y', $request->input('shipping_date'));
        }
        $tiv->fill($data);
        $tank = Tank::find($tank_id);
        $tiv->tank()->associate($tank);
        $tiv->save();

        // Display success according to add or update
        $alert = [
            'type' => 'alert-success',
            'msg' => 'L\'inspection du bloc '.$tank->number.' a correctement été ajouter'
        ];

        $request->session()->flash($alert['type'], $alert['msg']);
        return redirect('/admin/tank/tiv/'.$tank_id);
    }

    /**
     * Save new tiv
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request) {
        $id = $request->input('id');
        $tank_id = $request->input('tank_id');

        // Validation rules
        $validator = Validator::make($request->all(), [
            'review_date'              => 'required|date_format:d/m/Y',
            'reviewer_id'              => 'required|integer',
            'review_id'                => 'required|integer',
            'review_status_id'         => 'required|integer',
            'ext_state_id'             => 'required|integer',
            'int_state_id'             => 'required|integer',
            'int_oil'                  => 'sometimes|accepted',
            'int_residue_id'           => 'required|integer',
            'valve_id'                 => 'required|integer',
            'valve_ring_id'            => 'required|integer',
            'neck_thread_id'           => 'required|integer',
            'neck_thread_size_id'      => 'required|integer',
            'todo_maintenance_id'      => 'integer',
            'performed_maintenance_id' => 'integer',
            'previous_review_date'     => 'date_format:d/m/Y',
            'next_test_date'           => 'required|date_format:d/m/Y',
            'comment'                  => 'string',
            'shipping_date'            => 'required_with:recipient_id|date_format:d/m/Y',
            'recipient_id'             => 'required_with:shipping_date|integer',
            'decision_id'              => 'required|integer'
        ]);

        // Validation errors
        if ($validator->fails()) {
            return redirect('admin/tank/tiv/edit/'.$id)
                ->withErrors($validator)
                ->withInput();
        }

        // Find id or create new
        $tiv = Tiv::findOrFail($id);
        $data = $request->all();
        $data['int_oil'] = $request->input('int_oil', false) ? 1 : 0;
        $data['review_date'] = Carbon\Carbon::createFromFormat('d/m/Y', $request->input('review_date'));
        if ($request->input('next_test_date', false)) {
            $data['next_test_date'] = Carbon\Carbon::createFromFormat('d/m/Y', $request->input('next_test_date'));
        }
        if ($request->input('previous_review_date', false)) {
            $data['previous_review_date'] = Carbon\Carbon::createFromFormat('d/m/Y', $request->input('previous_review_date'));
        }
        if ($request->input('shipping_date', false)) {
            $data['shipping_date'] = Carbon\Carbon::createFromFormat('d/m/Y', $request->input('shipping_date'));
        }
        $tiv->fill($data);
        $tiv->save();

        // Display success according to add or update
        $alert = [
            'type' => 'alert-success',
            'msg' => 'L\'inspection du bloc '.$tiv->tank->number.' a correctement mis à jour'
        ];


        $request->session()->flash($alert['type'], $alert['msg']);
        return redirect('/admin/tank/tiv/'.$tank_id);
    }
}