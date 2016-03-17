<?php

namespace Emprunt\Http\Controllers\Admin;

use Emprunt\Borrow_history;
use Illuminate\Http\Request;

use Emprunt\Http\Controllers\Controller;
use Emprunt\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Hash;
use Emprunt\User;

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
        $users = User::where('firstname', '<>', 'SubAlcatel')->get();
        return view('pages.admin.user.list')->with('users', $users);
    }


    /**
     * @param $user_id
     * @return $this
     */
    public function edit($user_id) {
        $user = User::find($user_id);
        return view('pages.admin.user.edit')
            ->with('user', $user);
    }

    /**
     * @return mixed
     */
    public function add() {
        return view('pages.admin.user.add');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $id = $request->input('id');

       // Validation rules
        $validator = Validator::make($request->all(), [
            'firstname'  => 'required|string',
            'lastname'   => 'required|string',
            'email'      => 'required|email|max:255|unique:users',
            'phone_fix'  => 'string',
            'phone_mob'  => 'string',
            'phone_work' => 'string',
            'active'     => 'sometimes|accepted',
            'stab'       => 'sometimes|accepted',
            'regulator'  => 'sometimes|accepted',
            'tank'       => 'sometimes|accepted',
            'password'   => 'sometimes|confirmed|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/',
        ]);

        // Validation errors
        if ($validator->fails()) {
            if ($id) {
                return redirect('admin/user/edit/'.$id)
                    ->withErrors($validator)
                    ->withInput();
            } else {
                return redirect('admin/user/add')
                    ->withErrors($validator)
                    ->withInput();
            }
        }

        // Find id or create new
        $user = User::findOrNew($id);
        $data = $request->all();
        $data['active'] = $request->input('active', false) ? 1 : 0;
        $data['tank'] = $request->input('tank', false) ? 1 : 0;
        $data['regulator'] = $request->input('regulator', false) ? 1 : 0;
        $data['stab'] = $request->input('stab', false) ? 1 : 0;
        $data['password'] = bcrypt($request->input('password'));
        $user->fill($data);
        $user->save();

        // Display success according to add or update
        if ($id) {
            $alert = [
                'type' => 'alert-success',
                'msg' => 'L\'utilisateur '.$user->firstname.' '.$user->lastname.' a correctement mis à jour'
            ];
        } else {
            $alert = [
                'type' => 'alert-success',
                'msg' => 'L\'utilisateur '.$user->firstname.' '.$user->lastname.' a correctement été ajouter'
            ];
        }

        $request->session()->flash($alert['type'], $alert['msg']);
        return redirect('admin/user');
    }

    /**
     * @param $user_id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($user_id, Request $request) {
        $user = User::findOrFail($user_id);

        $user->delete();

        $alert = [
            'type' => "alert-success",
            'msg'  => 'L\'utilisateur '.$user->firstname.' '.$user->lastname.' a été supprimer'
        ];
        $request->session()->flash($alert['type'], $alert['msg']);

        return redirect('admin/user');
    }
}
