<?php

namespace Emprunt\Http\Controllers;

use Illuminate\Http\Request;

use Emprunt\Http\Requests;
use Emprunt\User;

class HomeController extends Controller
{
    public function index () {
        $users = User::where('active', true)->get();
        return view('pages.users')->with('users', $users);
    }
}
