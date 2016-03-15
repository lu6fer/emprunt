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

/**
 * Class TankController
 * @package Emprunt\Http\Controllers\Admin
 */
class UserController extends Controller
{
    /**
     * @return $this
     */
    public function index() {
        $users = User::all();
        return view('pages.admin.user.list')->with('users', $users);
    }

    /**
     * @return $this
     */
    public function history() {
        $history = Borrow_history::where('device_type', 'tank')->orderBy('return_date', 'desc')->get();
        foreach ($history as $tank) {
            $borrow = strtotime($tank->borrow_date);
            $return = strtotime($tank->return_date);
            $datediff = $return - $borrow;
            $tank->duration = floor($datediff/(60*60*24));
        }
        return view('pages.admin.tank.history')->with('history', $history);
    }

    /**
     * @param $tank_id
     * @return mixed
     */
    public function edit($tank_id) {
        $tank = Tank::find($tank_id);
        $users = User::all();
        $statuses = Status::all();
        return view('pages.admin.tank.edit')
            ->with('tank', $tank)
            ->with('users', $users)
            ->with('statuses', $statuses);
    }

    /**
     * @return mixed
     */
    public function add() {
        $users = User::all();
        return view('pages.admin.tank.edit')->with('users', $users);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $id = $request->input('id');

       // Validation rules
        $validator = Validator::make($request->all(), [
            'number' => 'required|numeric',
            'borrowable' => 'sometimes|accepted',
            'brand' => 'string',
            'model' => 'string',
            'size' => 'required|string',
            'sn_valve' => 'required_without:sn_cylinder|string',
            'sn_cylinder' => 'required_without:sn_valve|string',
            'test_pressure' => 'required|numeric',
            'operating_pressure' => 'required|numeric',
            'usage' => 'required|string',
            'owner' => 'required|integer'
        ]);

        // Validation errors
        if ($validator->fails()) {
            return redirect('admin/tank/edit/'.$id)
                ->withErrors($validator)
                ->withInput();
        }

        // Find id or create new
        $tank = Tank::findOrNew($id);
        $data = $request->all();
        $data['borrowable'] = $request->input('borrowable', false) ? 1 : 0;
        $tank->fill($data);
        $tank->save();

        // Display success according to add or update
        if ($id) {
            $alert = [
                'type' => 'alert-success',
                'msg' => 'Le bloc '.$tank->number.' a correctement mis à jour'
            ];
        } else {
            $alert = [
                'type' => 'alert-success',
                'msg' => 'Le bloc '.$tank->number.' a correctement été ajouter'
            ];
        }

        $request->session()->flash($alert['type'], $alert['msg']);
        return redirect('admin/tank');
    }
}
