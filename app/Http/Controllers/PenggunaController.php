<?php

namespace App\Http\Controllers;

use App\Models\Keluar;
use App\Models\Pasien;
use App\Models\Periksa;
use App\Models\Rekam;
use App\Models\Sakit;
use App\Models\Stok;
use App\Models\Surat;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('pengguna.index');
    }

    public function obat()
    {
        return view('pengguna.data_obat', [
            'obat' => Stok::orderby('id', 'desc')->get(),
        ]);
    }

    public function riwayat($nik = null)
    {
        if($nik){

        $pasien = Pasien::where('nik', $nik)->get();
        $id = Pasien::where('nik', $nik)->pluck('id')->first();

        $cek = Rekam::join('periksa', 'periksa.id', '=', 'rekam.id_rekam')
                        ->where('periksa.id_pasien', $id)
                        ->get();

        $keluar = Keluar::join('obatstok', 'obatstok.id', '=', 'obatkeluar.id_obat')
                            ->where('obatkeluar.nik', $nik)
                            ->get();

        $sakit = Sakit::join('surat', 'surat.id', '=', 'sakit.id_surat')
                            ->where('sakit.nim', $nik)
                            ->get();

        return view('pengguna.riwayat_pasien', [
            'pasien' => $pasien,
            'periksa' => $cek,
            'keluar' => $keluar,
            'sakit' => $sakit,
        ]);

        }else{
            return back();
        }
    }

    public function surat($id)
    {
        return view('pengguna.surat_print', [
            'surat' => Surat::find($id)->first(),
            'sakit' => Sakit::where('id_surat', $id)->first(),
        ]);
    }
}
