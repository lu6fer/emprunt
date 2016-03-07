<?php

namespace Emprunt\Http\Controllers;

use Illuminate\Http\Request;

use Emprunt\Http\Requests;
use Emprunt\User;
use Emprunt\Stab;
use Emprunt\Regulator;
use Emprunt\Block;

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
        $user->load(['stabs', 'regulators', 'blocks']);

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
        foreach ($user->blocks as $block) {
            $borrow = strtotime($block->pivot->borrow_date);
            $datediff = $now - $borrow;
            $block->pivot->duration = floor($datediff/(60*60*24));
        }

        // Get stabs available list
        $stabs = Stab::doesntHave('users')->get();
        // Get regulators available list
        $regulators = Regulator::doesntHave('users')->get();
        // Get blocks available list
        $blocks = Block::doesntHave('users')->get();
        // Return view with model data
        return view('pages.borrow')
            ->with('user', $user)
            ->with('regulators', $regulators)
            ->with('blocks', $blocks)
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
                $user->stabs()->attach($stab_id, ['borrow_date' => date("Y-m-d H:i:s")]);
                break;
            case 'regulator':
                $regulator_id = $request->input('regulator_id');
                $user->regulators()->attach($regulator_id, ['borrow_date' => date("Y-m-d H:i:s")]);
                break;
            case 'block':
                $block_id = $request->input('block_id');
                $user->blocks()->attach($block_id, ['borrow_date' => date("Y-m-d H:i:s")]);
                break;
        }
        $request->session()->flash('alert-success', 'Emprunt enregistré');
        return redirect()->back();
    }
}
