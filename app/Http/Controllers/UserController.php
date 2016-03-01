<?php

namespace Emprunt\Http\Controllers;

use Illuminate\Http\Request;

use Emprunt\Http\Requests;
use Emprunt\User;

class UserController extends Controller
{
    public function index () {
        $users = User::where('active', true)->get();
        return view('pages.users')->with('users', $users);
    }
}
