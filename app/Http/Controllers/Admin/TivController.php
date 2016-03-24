<?php

namespace Emprunt\Http\Controllers\Admin;

use Emprunt\Borrow_history;
use Illuminate\Http\Request;

use Emprunt\Http\Controllers\Controller;
use Emprunt\Http\Requests;
use Validator;
use Emprunt\Tank;
use Emprunt\User;
use Emprunt\Status;
use Emprunt\Tiv_status;
use Emprunt\Tiv;
use DB;

/**
 * Class TankController
 * @package Emprunt\Http\Controllers\Admin
 */
class TivController extends Controller
{
    /**
     * @param $tank_id
     * @return mixed
     */
    public function tivs($tank_id) {
        $tank = Tank::findOrFail($tank_id);
        $statuses = Tiv_status::all();
        $tank->load('tivs');

        /*foreach ($tank->tivs as $tiv) {
            if ($tiv->review_value->id == 90) {
                $tiv->next_test =
            }
        }*/

        return view('pages.admin.tank.tiv.list')
            ->with('tank', $tank)
            ->with('statuses', $statuses);
    }
    
    public function add($tank_id) {
        $tank = Tank::findOrFail($tank_id);
        $reviewers = User::all();
        $previous = Tiv::where('tank_id', $tank_id)->orderBy('review_date', 'desc')->first();
        $previous_test = DB::table('tivs')
            ->select('review_date')
            ->where('tank_id', $tank_id)
            ->where('review_id', '90')
            ->orderBy('review_date', 'desc')
            ->first();
        $tiv_datas = [
            'ext_state' => Tiv_status::where('type', 'ext_state')->get(),
            'int_residue' => Tiv_status::where('type', 'int_residue')->get(),
            'int_state' => Tiv_status::where('type', 'int_state')->get(),
            'neck_thread' => Tiv_status::where('type', 'neck_thread')->get(),
            'neck_thread_size' => Tiv_status::where('type', 'neck_thread_size')->get(),
            'performed_maintenance' => Tiv_status::where('type', 'performed_maintenance')->get(),
            'review' => Tiv_status::where('type', 'review')->get(),
            'review_status' => Tiv_status::where('type', 'review_status')->get(),
            'todo_maintenance' => Tiv_status::where('type', 'todo_maintenance')->get(),
            'valve' => Tiv_status::where('type', 'valve')->get(),
            'valve_ring' => Tiv_status::where('type', 'valve_ring')->get(),
            'recipient' => Tiv_status::where('type', 'recipient')->get(),
        ];
        return view('pages.admin.tank.tiv.add')
            ->with('tank', $tank)
            ->with('reviewers', $reviewers)
            ->with('tiv_datas', $tiv_datas)
            ->with('previous_tiv', $previous)
            ->with('previous_test', $previous_test);
    }
    
    public function detail($tiv_id) {
        return view('pages.admin.tank.tiv.detail');
    }

    public function store(Request $request) {
        return view('pages.admin.tank.tiv.list');
    }
}