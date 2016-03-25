<?php

namespace Emprunt\Http\Controllers\Admin;

use Emprunt\Borrow_history;
use Illuminate\Http\Request;

use Emprunt\Http\Controllers\Controller;
use Emprunt\Http\Requests;
use Validator;
use Emprunt\Tank;
use Emprunt\User;
use Emprunt\Status;
use Emprunt\Tiv_status;
use Emprunt\Tiv;
use DB;
use Carbon;

/**
 * Class TankController
 * @package Emprunt\Http\Controllers\Admin
 */
class TivController extends Controller
{
    /**
     * @param $tank_id
     * @return mixed
     */
    public function tivs($tank_id) {
        $tank = Tank::findOrFail($tank_id);
        $statuses = Tiv_status::all();
        $tank->load('tivs');

        /*foreach ($tank->tivs as $tiv) {
            if ($tiv->review_value->id == 90) {
                $tiv->next_test =
            }
        }*/

        return view('pages.admin.tank.tiv.list')
            ->with('tank', $tank)
            ->with('statuses', $statuses);
    }
    
    public function add($tank_id) {
        $tank = Tank::findOrFail($tank_id);
        $reviewers = User::all();
        $previous_tiv = Tiv::where('tank_id', $tank_id)->orderBy('review_date', 'desc')->first();
        $previous_test = DB::table('tivs')
            ->select('review_date')
            ->where('tank_id', $tank_id)
            ->where('review_id', '90')
            ->orderBy('review_date', 'desc')
            ->first();
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
        ];
        return view('pages.admin.tank.tiv.add')
            ->with('tank', $tank)
            ->with('reviewers', $reviewers)
            ->with('tiv_datas', $tiv_datas)
            ->with('previous_tiv', $previous_tiv)
            ->with('previous_test', $previous_test);
    }
    
    public function detail($tiv_id) {
        return view('pages.admin.tank.tiv.detail');
    }

    public function store(Request $request) {
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
        ]);

        // Validation errors
        if ($validator->fails()) {
            if ($id) {
                return redirect('admin/tank/tiv/edit/'.$id)
                    ->withErrors($validator)
                    ->withInput();
            } else {
                return redirect('admin/tank/tiv/add/'.$tank_id)
                    ->withErrors($validator)
                    ->withInput();
            }
        }

        // Find id or create new
        $tiv = Tiv::findOrNew($id);
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
        $tiv->save();

        $tank = Tank::find($tank_id);

        // Display success according to add or update
        if ($id) {
            $alert = [
                'type' => 'alert-success',
                'msg' => 'L\'inspection du bloc '.$tank->number.' a correctement mis à jour'
            ];
        } else {
            $alert = [
                'type' => 'alert-success',
                'msg' => 'L\'inspection du bloc '.$tank->number.' a correctement été ajouter'
            ];
        }

        $request->session()->flash($alert['type'], $alert['msg']);
        return redirect('/admin/tank/tiv/'.$tank_id);
    }
}