<?php

namespace App\Http\Controllers;

use App\Models\Keluar;
use App\Models\Masuk;
use App\Models\Stok;
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

    public function laporanfarmasi($id, $from = null, $to = null)
    {
    if($from && $to){
        if($id == "stok"){
            $data = Stok::orderby('id', 'desc')
                        ->whereBetween('expired', [$from, $to])
                        ->get();
        }else
        if($id == "masuk"){
            $data = Masuk::join('obatstok', 'obatstok.id', '=', 'id_obat')
                        ->whereBetween('obatmasuk.tgl_masuk', [$from, $to])
                        ->get();
        }else
        if($id == "keluar"){
            $data = Keluar::join('obatstok', 'obatstok.id', '=', 'id_obat')
                        ->whereBetween('obatkeluar.tgl_keluar', [$from, $to])
                        ->get();
        }
    }else{
        if($id == "stok"){
            $data = Stok::orderby('id', 'desc')->get();
        }else
        if($id == "masuk"){
            $data = Masuk::join('obatstok', 'obatstok.id', '=', 'id_obat')
                        ->get();
        }else
        if($id == "keluar"){
            $data = Keluar::join('obatstok', 'obatstok.id', '=', 'id_obat')
                        ->get();
        }
    }
        return view('farmasi.laporan',[
            'data' => $data,
            'jenis' => $id,
        ]);
    }
}
