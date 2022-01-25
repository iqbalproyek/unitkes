<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashFarmasiController extends Controller
{
    public function index()
    {
        return view('farmasi.index',[
            'stok' => DB::table('obatstok')->count(),
            'masuk' => DB::table('obatmasuk')->count(),
            'keluar' => DB::table('obatkeluar')->count(),
        ]);
    }
}
