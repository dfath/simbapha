<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VolumeDpaController extends Controller
{
    public function index()
    {
        return view('volume-dpa.board');
    }
}
