<?php

namespace Emprunt\Http\Controllers\Admin;

use Emprunt\Borrow_history;
use Emprunt\Stab_buy;
use Illuminate\Http\Request;

use Emprunt\Http\Controllers\Controller;
use Emprunt\Http\Requests;
use Validator;
use Emprunt\Stab;
use Emprunt\User;
use Emprunt\Status;
use Carbon\Carbon;

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
     * @return mixed
     */
    public function buy_history() {
        $tabs = Stab::all();
        return view('pages.admin.stab.buy')
            ->with('stabs', $tabs);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'number'     => 'required|numeric|unique:stabs,number',
            'borrowable' => 'sometimes|accepted',
            'brand'      => 'string',
            'model'      => 'string',
            'size'       => 'required|string',
            'owner_id'   => 'required|integer',
            'status_id'  => 'required|integer',
            'buy.shop'   => 'string',
            'buy.price'  => 'numeric',
            'buy.date'   => 'date_format:d/m/Y'
        ]);

        // Validation errors
        if ($validator->fails()) {
            return redirect('admin/stab/add')
                ->withErrors($validator)
                ->withInput();
        }

        // Find id or create new
        $stab = new Stab();
        $data = $request->all();
        $data['borrowable'] = $request->input('borrowable', false) ? 1 : 0;
        $stab->fill($data);
        $stab->save();

        $buy = new Stab_buy();
        $buy_data =$request->input('buy');
        $buy_data['date'] = Carbon::createFromFormat('d/m/Y', $request->input('buy.date'));
        $buy->fill($buy_data);
        $stab->buy()->save($buy);

        // Display success according to add or update
        $alert = [
            'type' => 'alert-success',
            'msg' => 'La stab '.$stab->number.' a correctement été ajouter'
        ];

        $request->session()->flash($alert['type'], $alert['msg']);
        return redirect('admin/stab');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request) {
        $id = $request->input('id');

        // Validation rules
        $validator = Validator::make($request->all(), [
            'number'     => 'required|numeric',
            'borrowable' => 'sometimes|accepted',
            'brand'      => 'string',
            'model'      => 'string',
            'size'       => 'required|string',
            'owner_id'   => 'required|integer',
            'status_id'  => 'required|integer',
            'buy.shop'   => 'string',
            'buy.price'  => 'numeric',
            'buy.date'   => 'date_format:d/m/Y'
        ]);

        // Validation errors
        if ($validator->fails()) {
            return redirect('admin/stab/edit/'.$id)
                ->withErrors($validator)
                ->withInput();
        }

        // Find id or create new
        $stab = Stab::findOrFail($id);
        $data = $request->all();
        $data['borrowable'] = $request->input('borrowable', false) ? 1 : 0;
        $stab->fill($data);
        $stab->save();

        $buy = $stab->buy;
        $buy_data =$request->input('buy');
        $buy_data['date'] = Carbon::createFromFormat('d/m/Y', $request->input('buy.date'));
        $buy->fill($buy_data);
        $stab->buy()->save($buy);

        // Display success according to add or update
        $alert = [
            'type' => 'alert-success',
            'msg' => 'La stab '.$stab->number.' a correctement mis à jour'
        ];

        $request->session()->flash($alert['type'], $alert['msg']);
        return redirect('admin/stab');
    }

    /**
     * @param $stab_id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($stab_id, Request $request) {
        $stab = Stab::findOrFail($stab_id);

        $stab->delete();

        $alert = [
            'type' => "alert-success",
            'msg'  => "Le bloc ".$stab->number." a été supprimer"
        ];
        $request->session()->flash($alert['type'], $alert['msg']);

        return redirect('admin/stab');
    }
}
