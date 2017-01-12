<?php

namespace Emprunt\Http\Controllers;

use DB;

class StatusController extends Controller
{
    public function index () {
        if (DB::connection()->getDatabaseName()) {
        	return response()->json('Application is up and running');
        }
        return response()->json('Unalbe to connect to database', '404');
    }
}
