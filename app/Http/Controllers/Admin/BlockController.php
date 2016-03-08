<?php

namespace Emprunt\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Emprunt\Http\Controllers\Controller;
use Emprunt\Http\Requests;
use Emprunt\Block;

class BlockController extends Controller
{
    public function index() {
        $blocks = Block::with('users')->get();
        return view('pages.admin.block-list')->with('blocks', $blocks);
    }
}
