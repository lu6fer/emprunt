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
    public function user($id) {
        // Get user info
        $user = User::find($id);
        // Grab model relationship
        $user->load(['stabs', 'regulators', 'blocks']);

        // Display borrow duration
        $now = time();
        foreach ($user->stabs as $stab) {
            $borrow = strtotime($stab->pivot->borrow);
            $datediff = $now - $borrow;
            $stab->pivot->duration = floor($datediff/(60*60*24));
        }
        foreach ($user->regulators as $regulator) {
            $borrow = strtotime($regulator->pivot->borrow);
            $datediff = $now - $borrow;
            $regulator->pivot->duration = floor($datediff/(60*60*24));
        }
        foreach ($user->blocks as $block) {
            $borrow = strtotime($block->pivot->borrow);
            $datediff = $now - $borrow;
            $block->pivot->duration = floor($datediff/(60*60*24));
        }

        // Get stabs available list
        $stabs = Stab::doesntHave('users')->get();
        // Get regulators available list
        $regulators = Regulator::doesntHave('users')->get();
        // Get blocks available list
        $blocks = Block::doesntHave('users')->get();
        return view('pages.borrow.user')
            ->with('user', $user)
            ->with('regulators', $regulators)
            ->with('blocks', $blocks)
            ->with('stabs', $stabs);
    }
}
