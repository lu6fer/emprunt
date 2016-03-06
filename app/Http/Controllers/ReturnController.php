<?php

namespace Emprunt\Http\Controllers;

use Illuminate\Http\Request;

use Emprunt\Http\Requests;
use DB;
use Emprunt\User;
use Emprunt\Stab;
use Emprunt\Block;
use Emprunt\Regulator;

class ReturnController extends Controller
{
    public function stab(Request $request) {
        $user_id = $request->input('user_id');
        $stab_id = $request->input('stab_id');
        DB::table('stab_user')
            ->where('user_id', $user_id)
            ->where('stab_id', $stab_id)
            ->update(array('deleted_at' => DB::raw('NOW()')));
        /*if ($user_id) {
            $user = User::find($user_id);
            $user->stabs()->detach($stab_id);
        } else {
            $stab = Stab::find($stab_id);
            $stab->users()->detach();
        }*/

        $request->session()->flash('alert-success', 'Retour de la stab enregistré');
        return redirect()->back();
    }

    public function regulator(Request $request) {
        $user_id = $request->input('user_id');
        $regulator_id = $request->input('regulator_id');
        DB::table('regulator_user')
            ->where('user_id', $user_id)
            ->where('stab_id', $regulator_id)
            ->update(array('deleted_at' => DB::raw('NOW()')));

        /*if ($user_id) {
            $user = User::find($user_id);
            $user->regulators()->detach($regulator_id);
        } else {
            $regulator = Regulator::find($regulator_id);
            $regulator->users()->detach();
        }*/

        $request->session()->flash('alert-success', 'Retour de la stab enregistré');
        return redirect()->back();
    }

    public function bloc(Request $request) {
        $user_id = $request->input('user_id');
        $block_id = $request->input('block_id');
        DB::table('block_user')
            ->where('user_id', $user_id)
            ->where('stab_id', $block_id)
            ->update(array('deleted_at' => DB::raw('NOW()')));

        /*if ($user_id) {
            $user = User::find($user_id);
            $user->blocks()->detach($block_id);
        } else {
            $block = Block::find($block_id);
            $block->users()->detach();
        }*/

        $request->session()->flash('alert-success', 'Retour de la stab enregistré');
        return redirect()->back();
    }
}
