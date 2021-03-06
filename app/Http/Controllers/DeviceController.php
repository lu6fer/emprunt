<?php

namespace Emprunt\Http\Controllers;

use Illuminate\Http\Request;

use Emprunt\Http\Requests;
use Emprunt\Regulator;
use Emprunt\Stab;
use Emprunt\Tank;

class DeviceController extends Controller
{
    public function index () {
        // Grab stabs model and user related
        $stabs = Stab::where('borrowable', true)
            ->where('status_id', '1')
            ->with('users')
            ->get();
        // Grab regulators model and user related
        $regulators = Regulator::where('borrowable', true)
            ->where('status_id', '1')
            ->with('users')
            ->get();
        // Grab tanks model and user related
        $tanks = Tank::where('borrowable', true)
            ->where('status_id', '1')
            ->with('users')
            ->get();

        return view('pages.devices')
            ->with('stabs', $stabs)
            ->with('regulators', $regulators)
            ->with('tanks', $tanks);
    }
}
