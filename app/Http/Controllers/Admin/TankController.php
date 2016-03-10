<?php

namespace Emprunt\Http\Controllers\Admin;

use Emprunt\Borrow_history;
use Illuminate\Http\Request;

use Emprunt\Http\Controllers\Controller;
use Emprunt\Http\Requests;
use Emprunt\Tank;
use Emprunt\User;

class TankController extends Controller
{
    public function index() {
        $tanks = Tank::with('users')->get();
        return view('pages.admin.tank.list')->with('tanks', $tanks);
    }

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

    public function edit($tank_id) {
        $tank = Tank::find($tank_id);
        $tank->load(['owner']);
        $users = User::all();
        return view('pages.admin.tank.edit')->with('tank', $tank)->with('users', $users);
    }
}
