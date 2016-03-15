<?php

namespace Emprunt\Http\Controllers\Admin;

use Emprunt\Borrow_history;
use Illuminate\Http\Request;

use Emprunt\Http\Controllers\Controller;
use Emprunt\Http\Requests;
use Validator;
use Emprunt\Stab;
use Emprunt\User;
use Emprunt\Status;

/**
 * Class TankController
 * @package Emprunt\Http\Controllers\Admin
 */
class StabController extends Controller
{
    /**
     * @return $this
     */
    public function index() {
        $stabs = Stab::with('users')->get();
        $statuses = Status::all();
        return view('pages.admin.stab.list')->with('stabs', $stabs)->with('statuses', $statuses);
    }

    /**
     * @return $this
     */
    public function history() {
        $history = Borrow_history::where('device_type', 'stab')->orderBy('return_date', 'desc')->get();
        foreach ($history as $stab) {
            $borrow = strtotime($stab->borrow_date);
            $return = strtotime($stab->return_date);
            $datediff = $return - $borrow;
            $stab->duration = floor($datediff/(60*60*24));
        }
        return view('pages.admin.stab.history')->with('history', $history);
    }

    /**
     * @param $stab_id
     * @return mixed
     */
    public function edit($stab_id) {
        $stab = Stab::find($stab_id);
        $users = User::all();
        $statuses = Status::all();
        return view('pages.admin.stab.edit')
            ->with('stab', $stab)
            ->with('users', $users)
            ->with('statuses', $statuses);
    }

    /**
     * @return mixed
     */
    public function add() {
        $users = User::all();
        $statuses = Status::all();
        return view('pages.admin.stab.add')
            ->with('users', $users)
            ->with('statuses', $statuses);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $id = $request->input('id');

        // Validation rules
        $validator = Validator::make($request->all(), [
            'number'     => 'required|numeric',
            'borrowable' => 'sometimes|accepted',
            'brand'      => 'string',
            'model'      => 'string',
            'size'       => 'required|string',
            'owner'      => 'required|integer',
            'status'     => 'required|integer',
        ]);

        // Validation errors
        if ($validator->fails()) {
            return redirect('admin/stab/edit/'.$id)
                ->withErrors($validator)
                ->withInput();
        }

        // Find id or create new
        $stab = Stab::findOrNew($id);
        $data = $request->all();
        $data['borrowable'] = $request->input('borrowable', false) ? 1 : 0;
        $stab->fill($data);
        $stab->save();

        // Display success according to add or update
        if ($id) {
            $alert = [
                'type' => 'alert-success',
                'msg' => 'La stab '.$stab->number.' a correctement mis à jour'
            ];
        } else {
            $alert = [
                'type' => 'alert-success',
                'msg' => 'La stab '.$stab->number.' a correctement été ajouter'
            ];
        }

        $request->session()->flash($alert['type'], $alert['msg']);
        return redirect('admin/stab');
    }
}
