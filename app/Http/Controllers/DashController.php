<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'pengumuman' => Pengumuman::orderby('id', 'desc')->get(),
        ]);
    }
}
