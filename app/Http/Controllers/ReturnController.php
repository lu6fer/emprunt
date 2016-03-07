<?php

namespace Emprunt\Http\Controllers;

use Illuminate\Http\Request;

use Emprunt\Http\Requests;
use DB;
use Emprunt\User;
use Emprunt\Stab;
use Emprunt\Block;
use Emprunt\Regulator;
use Emprunt\Borrow_history;

/**
 * Class ReturnController
 * @package Emprunt\Http\Controllers
 */
class ReturnController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function stab(Request $request) {
        $user_id = $request->input('user_id');
        $stab_id = $request->input('stab_id');

        $user = User::find($user_id);
        $stab = Stab::find($stab_id);
        $borrow = DB::select('select borrow_date from stab_user where user_id = ? and stab_id = ?', [$user_id, $stab_id]);

        $borrow_history = new Borrow_history();
        $borrow_history->user = $user->firstname.' '.$user->lastname;
        $borrow_history->device_type = 'stab';
        $borrow_history->device_number = $stab->number;
        $borrow_history->device_description = $stab->brand.' - '.$stab->model.' - '.$stab->size;
        $borrow_history->borrow_date = $borrow[0]->borrow_date;
        $borrow_history->save();

        $user->stabs()->detach($stab_id);


        $request->session()->flash('alert-success', 'Retour de la stab enregistré');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function regulator(Request $request) {
        $user_id = $request->input('user_id');
        $regulator_id = $request->input('regulator_id');

        $user = User::find($user_id);
        $regulator = Regulator::find($regulator_id);
        $borrow = DB::select('select borrow_date from regulator_user where user_id = ? and regulator_id = ?', [$user_id, $regulator_id]);

        $borrow_history = new Borrow_history();
        $borrow_history->user = $user->firstname.' '.$user->lastname;
        $borrow_history->device_type = 'regulator';
        $borrow_history->device_number = $regulator->number;
        $borrow_history->device_description = $regulator->brand.' - '.$regulator->model.' - '.$regulator->size;
        $borrow_history->borrow_date = $borrow[0]->borrow_date;
        $borrow_history->save();

        $user->regulators()->detach($regulator_id);

        $request->session()->flash('alert-success', 'Retour du détendeur enregistré');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function block(Request $request) {
        $user_id = $request->input('user_id');
        $block_id = $request->input('block_id');

        $user = User::find($user_id);
        $bloc = Block::find($block_id);
        $borrow = DB::select('select borrow_date from block_user where user_id = ? and block_id = ?', [$user_id, $block_id]);

        $borrow_history = new Borrow_history();
        $borrow_history->user = $user->firstname.' '.$user->lastname;
        $borrow_history->device_type = 'block';
        $borrow_history->device_number = $bloc->number;
        $borrow_history->device_description = $bloc->brand.' - '.$bloc->model.' - '.$bloc->size;
        $borrow_history->borrow_date = $borrow[0]->borrow_date;
        $borrow_history->save();

        $user->blocks()->detach($block_id);

        $request->session()->flash('alert-success', 'Retour du bloc enregistré');
        return redirect()->back();
    }
}
