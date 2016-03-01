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
        $devices = [
            'stabs' => Stab::where('active', true)->get(),
            'regulators' => Regulator::where('active', true)->get(),
            'blocks' => Block::where('active', true)->get()
        ];
        return view('pages.devices')->with('devices', $devices);
    }
}
