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
        $user = User::find($id);
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

        return view('pages.borrow.user')->with('user', $user);
    }
}
