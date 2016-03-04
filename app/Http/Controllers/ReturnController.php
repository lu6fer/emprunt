<?php

namespace Emprunt\Http\Controllers;

use Illuminate\Http\Request;

use Emprunt\Http\Requests;
use Emprunt\User;
use Emprunt\Stab;
use Emprunt\Block;
use Emprunt\Regulator;

class ReturnController extends Controller
{
    public function stab(Request $request) {
        $user_id = $request->input('user_id');
        $stab_id = $request->input('stab_id');
        if ($user_id) {
            $user = User::find($user_id);
            $user->stabs()->detach($stab_id);
        } else {
            $stab = Stab::find($stab_id);
            $stab->users()->detach();
        }


        return redirect()->back();
    }

    public function regulator(Request $request) {
        $user_id = $request->input('user_id');
        $regulator_id = $request->input('regulator_id');

        if ($user_id) {
            $user = User::find($user_id);
            $user->regulators()->detach($regulator_id);
        } else {
            $regulator = Regulator::find($regulator_id);
            $regulator->users()->detach();
        }

        return redirect()->back();
    }

    public function bloc(Request $request) {
        $user_id = $request->input('user_id');
        $block_id = $request->input('block_id');

        if ($user_id) {
            $user = User::find($user_id);
            $user->blocks()->detach($block_id);
        } else {
            $block = Block::find($block_id);
            $block->users()->detach();
        }

        return redirect()->back();
    }
}
