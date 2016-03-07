<?php

namespace Emprunt\Http\Controllers;

use Illuminate\Http\Request;

use Emprunt\Http\Requests;
use Emprunt\Regulator;
use Emprunt\Stab;
use Emprunt\Block;

class DeviceController extends Controller
{
    public function index () {
        // Grab stabs model and add flag if borrow
        $stabs = Stab::where('active', true)
            ->with('users')
            ->get();
        // Grab regulators model and add flag if borrow
        $regulators = Regulator::where('active', true)
            ->with('users')
            ->get();
        // Grab blocks model and add flag if borrow
        $blocks = Block::where('active', true)
            ->with('users')
            ->get();

        return view('pages.devices')
            ->with('stabs', $stabs)
            ->with('regulators', $regulators)
            ->with('blocks', $blocks);
    }
}
