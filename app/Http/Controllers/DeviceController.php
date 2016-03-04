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
        $stabs = Stab::where('active', true)->get();
        foreach ($stabs as $stab) {
            $stab->borrow = (count($stab->users)) ? true : false;
        }
        // Grab regulators model and add flag if borrow
        $regulators = Regulator::where('active', true)->get();
        foreach ($regulators as $regulator) {
            $regulator->borrow = (count($regulator->users)) ? true : false;
        }
        // Grab blocks model and add flag if borrow
        $blocks = Block::where('active', true)->get();
        foreach ($blocks as $bloc) {
            $bloc->borrow = (count($bloc->users)) ? true : false;
        }

        return view('pages.devices')
            ->with('stabs', $stabs)
            ->with('regulators', $regulators)
            ->with('blocks', $blocks);
    }
}
