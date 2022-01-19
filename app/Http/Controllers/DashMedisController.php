<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashMedisController extends Controller
{
    public function index()
    {
        return view('medis.index');
    }
}
