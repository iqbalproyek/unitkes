<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashFarmasiController extends Controller
{
    public function index()
    {
        return view('farmasi.index');
    }
}
