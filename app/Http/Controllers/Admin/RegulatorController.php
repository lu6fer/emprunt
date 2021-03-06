<?php

namespace Emprunt\Http\Controllers\Admin;

use Emprunt\Borrow_history;
use Illuminate\Http\Request;

use Emprunt\Http\Controllers\Controller;
use Emprunt\Http\Requests;
use Validator;
use Emprunt\Regulator;
use Emprunt\User;
use Emprunt\Status;

/**
 * Class TankController
 * @package Emprunt\Http\Controllers\Admin
 */
class RegulatorController extends Controller
{
    /**
     * @return $this
     */
    public function index() {
        $tanks = Regulator::with('users')->get();
        $statuses = Status::all();
        return view('pages.admin.regulator.list')->with('regulators', $tanks)->with('statuses', $statuses);
    }

    /**
     * @return $this
     */
    public function history() {
        $history = Borrow_history::where('device_type', 'regulator')->orderBy('return_date', 'desc')->get();
        foreach ($history as $regulator) {
            $borrow = strtotime($regulator->borrow_date);
            $return = strtotime($regulator->return_date);
            $datediff = $return - $borrow;
            $regulator->duration = floor($datediff/(60*60*24));
        }
        return view('pages.admin.regulator.history')->with('history', $history);
    }

    /**
     * @param $regulator_id
     * @return mixed
     */
    public function edit($regulator_id) {
        $regulator = Regulator::find($regulator_id);
        $users = User::all();
        $statuses = Status::all();
        return view('pages.admin.regulator.edit')
            ->with('regulator', $regulator)
            ->with('users', $users)
            ->with('statuses', $statuses);
    }

    /**
     * @return mixed
     */
    public function add() {
        $users = User::all();
        $statuses = Status::all();
        return view('pages.admin.regulator.add')
            ->with('statuses', $statuses)
            ->with('users', $users);
    }

    /**
     * @return mixed
     */
    public function buy_history() {
        $regulators = Regulator::all();
        return view('pages.admin.regulator.buy')
            ->with('regulators', $regulators);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
       // Validation rules
        $validator = Validator::make($request->all(), [
            'number'        => 'required|numeric',
            'borrowable'    => 'sometimes|accepted',
            'brand'         => 'string',
            'model'         => 'string',
            'type'          => 'required|string',
            'sn_stage_1'    => 'required|string',
            'sn_stage_2'    => 'required|string',
            'sn_stage_octo' => 'sometimes|string',
            'usage'         => 'required|string',
            'owner_id'      => 'required|integer',
            'status_id'     => 'required|integer'
        ]);

        // Validation errors
        if ($validator->fails()) {
            return redirect('admin/regulator/add')
                ->withErrors($validator)
                ->withInput();
        }

        // Find id or create new
        $regulator = new Regulator();
        $data = $request->all();
        $data['borrowable'] = $request->input('borrowable', false) ? 1 : 0;
        $regulator->fill($data);
        $regulator->save();

        // Display success according to add or update
        $alert = [
            'type' => 'alert-success',
            'msg' => 'Le détendeur '.$regulator->number.' a correctement été ajouter'
        ];

        $request->session()->flash($alert['type'], $alert['msg']);
        return redirect('admin/regulator');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request) {
        $id = $request->input('id');

        // Validation rules
        $validator = Validator::make($request->all(), [
            'number'        => 'required|numeric',
            'borrowable'    => 'sometimes|accepted',
            'brand'         => 'string',
            'model'         => 'string',
            'type'          => 'required|string',
            'sn_stage_1'    => 'required|string',
            'sn_stage_2'    => 'required|string',
            'sn_stage_octo' => 'sometimes|string',
            'usage'         => 'required|string',
            'owner_id'      => 'required|integer',
            'status_id'     => 'required|integer'
        ]);

        // Validation errors
        if ($validator->fails()) {
            return redirect('admin/regulator/edit/'.$id)
                ->withErrors($validator)
                ->withInput();
        }

        // Find id or create new
        $regulator = Regulator::findOrFail($id);
        $data = $request->all();
        $data['borrowable'] = $request->input('borrowable', false) ? 1 : 0;
        $regulator->fill($data);
        $regulator->save();

        // Display success according to add or update
        $alert = [
            'type' => 'alert-success',
            'msg' => 'Le détendeur '.$regulator->number.' a correctement mis à jour'
        ];

        $request->session()->flash($alert['type'], $alert['msg']);
        return redirect('admin/regulator');
    }

    /**
     * @param $regulator_id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($regulator_id, Request $request) {
        $regulator = Regulator::findOrFail($regulator_id);

        $regulator->delete();

        $alert = [
            'type' => "alert-success",
            'msg'  => "Le bloc ".$regulator->number." a été supprimer"
        ];
        $request->session()->flash($alert['type'], $alert['msg']);

        return redirect('admin/regulator');
    }
}
