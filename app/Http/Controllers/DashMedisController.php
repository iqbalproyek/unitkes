<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashMedisController extends Controller
{
    public function index()
    {
        $mhs = DB::table('periksa')
        ->join('pasien', 'pasien.id', '=', 'id_pasien')
        ->where('kategori', 'Mahasiswa')
        ->count();

        $dsn = DB::table('periksa')
        ->join('pasien', 'pasien.id', '=', 'id_pasien')
        ->where('kategori', 'Dosen')
        ->count();

        $pgw = DB::table('periksa')
        ->join('pasien', 'pasien.id', '=', 'id_pasien')
        ->where('kategori', 'pegawai')
        ->count();
        return view('medis.index',[
            'mhs' => $mhs,
            'dsn' => $dsn,
            'pgw' => $pgw,
        ]);
    }
}
