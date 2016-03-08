<?php

namespace Emprunt\Http\Controllers\Admin;

use Emprunt\Borrow_history;
use Illuminate\Http\Request;

use Emprunt\Http\Controllers\Controller;
use Emprunt\Http\Requests;
use Emprunt\Block;

class BlockController extends Controller
{
    public function index() {
        $blocks = Block::with('users')->get();
        return view('pages.admin.block.list')->with('blocks', $blocks);
    }

    public function history() {
        $history = Borrow_history::where('device_type', 'block')->orderBy('return_date', 'desc')->get();
        foreach ($history as $block) {
            $borrow = strtotime($block->borrow_date);
            $return = strtotime($block->return_date);
            $datediff = $return - $borrow;
            $block->duration = floor($datediff/(60*60*24));
        }
        return view('pages.admin.block.history')->with('history', $history);
    }
}
