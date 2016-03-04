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

        $user = User::find($user_id);
        $user->stabs()->detach($stab_id);

        return redirect()->back();
    }

    public function regulator(Request $request) {
        $user_id = $request->input('user_id');
        $regulator_id = $request->input('regulator_id');

        $user = User::find($user_id);
        $user->stabs()->detach($regulator_id);

        return redirect()->back();
    }

    public function bloc(Request $request) {
        $user_id = $request->input('user_id');
        $block_id = $request->input('block_id');

        $user = User::find($user_id);
        $user->stabs()->detach($block_id);

        return redirect()->back();
    }
}
