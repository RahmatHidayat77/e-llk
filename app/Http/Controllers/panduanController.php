<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class panduanController extends Controller
{
    public function index()
    {
        return view('panduan');
    }
}
