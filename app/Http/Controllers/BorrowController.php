<?php

namespace Emprunt\Http\Controllers;

use Illuminate\Http\Request;

use Emprunt\Http\Requests;
use Emprunt\User;
use Emprunt\Stab;
use Emprunt\Regulator;
use Emprunt\Tank;

class BorrowController extends Controller
{
    /**
     * Display user borrow
     * @param $user_id
     * @return mixed
     */
    public function user($user_id) {
        // Get user info
        $user = User::find($user_id);
        // Grab model relationship
        $user->load(['stabs', 'regulators', 'tanks']);

        // Display borrow duration
        $now = time();
        foreach ($user->stabs as $stab) {
            $borrow = strtotime($stab->pivot->borrow_date);
            $datediff = $now - $borrow;
            $stab->pivot->duration = floor($datediff/(60*60*24));
        }
        foreach ($user->regulators as $regulator) {
            $borrow = strtotime($regulator->pivot->borrow_date);
            $datediff = $now - $borrow;
            $regulator->pivot->duration = floor($datediff/(60*60*24));
        }
        foreach ($user->tanks as $tank) {
            $borrow = strtotime($tank->pivot->borrow_date);
            $datediff = $now - $borrow;
            $tank->pivot->duration = floor($datediff/(60*60*24));
        }

        // Get stabs available list
        $stabs = Stab::doesntHave('users')->get();
        // Get regulators available list
        $regulators = Regulator::doesntHave('users')->get();
        // Get blocks available list
        $tanks = Tank::doesntHave('users')->get();
        // Return view with model data
        return view('pages.borrow')
            ->with('user', $user)
            ->with('regulators', $regulators)
            ->with('tanks', $tanks)
            ->with('stabs', $stabs);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function device(Request $request) {
        $type = $request->input('type');
        $user = User::find($request->input('user_id'));

        switch ($type) {
            case 'stab':
                $stab_id = $request->input('stab_id');
                if ($user->stab) {
                    $user->stabs()->attach($stab_id, ['borrow_date' => date("Y-m-d H:i:s")]);
                    $alert = [
                        'type' => 'alert-success',
                        'msg'  => 'La stab est a jouté a votre liste d\'emprunt'
                    ];
                } else {
                    $alert = [
                        'type' => 'alert-warning',
                        'msg'  => 'Vous n\'avez pas les droits suffisant pour cette emprunt'
                    ];
                }
                break;
            case 'regulator':
                $regulator_id = $request->input('regulator_id');
                if ($user->regulator) {
                    $user->regulators()->attach($regulator_id, ['borrow_date' => date("Y-m-d H:i:s")]);
                    $alert = [
                        'type' => 'alert-success',
                        'msg'  => 'Le détendeur est a jouté a votre liste d\'emprunt'
                    ];
                } else {
                    $alert = [
                        'type' => 'alert-warning',
                        'msg'  => 'Vous n\'avez pas les droits suffisant pour cette emprunt'
                    ];
                }
                break;
            case 'tank':
                $block_id = $request->input('tank_id');
                if ($user->tank) {
                    $user->tanks()->attach($block_id, ['borrow_date' => date("Y-m-d H:i:s")]);
                    $alert = [
                        'type' => 'alert-success',
                        'msg'  => 'Le bloc est a jouté a votre liste d\'emprunt'
                    ];
                } else {
                    $alert = [
                        'type' => 'alert-warning',
                        'msg'  => 'Vous n\'avez pas les droits suffisant pour cette emprunt'
                    ];
                }
                break;
        }
        $request->session()->flash($alert['type'], $alert['msg']);
        return redirect()->back();
    }
}
