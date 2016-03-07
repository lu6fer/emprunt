<?php

namespace Emprunt\Http\Controllers\Admin;

use Emprunt\Http\Controllers\Controller;
use Emprunt\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $auth_user = Auth::user();
        return view('pages.admin.dashboard')->with('auth_user', $auth_user);
    }
}
