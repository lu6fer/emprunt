<?php

namespace Emprunt\Http\Controllers\Admin;

use Emprunt\Http\Controllers\Controller;
use Emprunt\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Emprunt\Tank;
use Emprunt\Stab;
use Emprunt\Regulator;
use DB;
use Illuminate\Support\Facades\Response;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanks = Tank::where('status_id', 1)->count();
        $tanks_borrowed = DB::table('tank_user')->count();
        //$tanks_history = DB::select('select count(borrow_date) as history, month(borrow_date) as month from borrow_histories where device_type = ? group by month(borrow_date);', ['tank']);
        $stabs = Stab::where('status_id', 1)->count();
        $stabs_borrowed = DB::table('stab_user')->count();
        //$stabs_history = DB::select('select count(borrow_date) as history, month(borrow_date) as month from borrow_histories where device_type = ? group by month(borrow_date);', ['stab']);
        $regulators = Regulator::where('status_id', 1)->count();
        $regulators_borrowed = DB::table('regulator_user')->count();
        //$regulators_history = DB::select('select count(borrow_date) as history, month(borrow_date) as month from borrow_histories where device_type = ? group by month(borrow_date);', ['regulator']);
        $disponibility = [
            'tanks' => [
                'all' => $tanks,
                'available' => $tanks - $tanks_borrowed,
                'borrowed'  => $tanks_borrowed
            ],
            'stabs' => [
                'all' => $stabs,
                'available' => $stabs - $stabs_borrowed,
                'borrowed'  => $stabs_borrowed
            ],
            'regulators' => [
                'all' => $regulators,
                'available' => $regulators - $regulators_borrowed,
                'borrowed'  => $regulators_borrowed
            ]
        ];
        $borrow_history = DB::select("select date_format(borrow_date, '%Y-%m') as period, 
                                             device_type as device, 
                                             count(borrow_date) as history
                                      from borrow_histories
                                      group by year(borrow_date), month(borrow_date), device_type;");

        return view('pages.admin.dashboard')
            ->with('disponibility', json_encode($disponibility))
            ->with('borrow_history', json_encode($borrow_history));
    }
}
