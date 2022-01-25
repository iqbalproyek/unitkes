<?php

namespace App\Http\Controllers;

use App\Models\Rekam;
use App\Models\Sakit;
use App\Models\Sehat;
use App\Models\Surat;
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

        $izin = Surat::where('jenis_surat', 'sakit')->count();
        $sehat = Surat::where('jenis_surat', 'sehat')->count();

        return view('medis.index',[
            'mhs' => $mhs,
            'dsn' => $dsn,
            'pgw' => $pgw,
            'izin' => $izin,
            'sehat' => $sehat,
        ]);
    }

    public function laporan($id){
        if ($id == 'dosen'){
            $data = Rekam::join('periksa', 'periksa.id', '=', 'id_rekam')
                        ->join('pasien', 'pasien.id', '=', 'periksa.id_pasien')
                        ->where('pasien.kategori', 'Dosen')
                        ->get();
        }else
        if($id == 'mahasiswa'){
            $data = Rekam::join('periksa', 'periksa.id', '=', 'id_rekam')
                        ->join('pasien', 'pasien.id', '=', 'periksa.id_pasien')
                        ->where('pasien.kategori', 'Mahasiswa')
                        ->get();
        }else
        if($id == 'pegawai'){
            $data = Rekam::join('periksa', 'periksa.id', '=', 'id_rekam')
                        ->join('pasien', 'pasien.id', '=', 'periksa.id_pasien')
                        ->where('pasien.kategori', 'pegawai')
                        ->get();
        }
        if($id == 'sakit'){
            $data = Sakit::join('surat', 'surat.id', '=', 'id_surat')
                        ->where('surat.jenis_surat', 'sakit')
                        ->get();
        }
        if($id == 'sehat'){
            $data = Sehat::join('surat', 'surat.id', '=', 'id_surat')
                        ->where('surat.jenis_surat', 'sehat')
                        ->get();
        }
        return view('medis.laporan',[
            'data' => $data,
            'jenis' => $id,
        ]);
    }

    public function laporanfilter($id, $from, $to)
    {
        if ($id == 'dosen'){
            $data = Rekam::join('periksa', 'periksa.id', '=', 'id_rekam')
                        ->join('pasien', 'pasien.id', '=', 'periksa.id_pasien')
                        ->where('pasien.kategori', 'Dosen')
                        ->whereBetween('periksa.tanggal', [$from, $to])
                        ->get();
        }else
        if($id == 'mahasiswa'){
            $data = Rekam::join('periksa', 'periksa.id', '=', 'id_rekam')
                        ->join('pasien', 'pasien.id', '=', 'periksa.id_pasien')
                        ->where('pasien.kategori', 'Mahasiswa')
                        ->whereBetween('periksa.tanggal', [$from, $to])
                        ->get();
        }else
        if($id == 'pegawai'){
            $data = Rekam::join('periksa', 'periksa.id', '=', 'id_rekam')
                        ->join('pasien', 'pasien.id', '=', 'periksa.id_pasien')
                        ->where('pasien.kategori', 'pegawai')
                        ->whereBetween('periksa.tanggal', [$from, $to])
                        ->get();
        }
        if($id == 'sakit'){
            $data = Sakit::join('surat', 'surat.id', '=', 'id_surat')
                        ->where('surat.jenis_surat', 'sakit')
                        ->whereBetween('surat.tanggal', [$from, $to])
                        ->get();
        }
        if($id == 'sehat'){
            $data = Sehat::join('surat', 'surat.id', '=', 'id_surat')
                        ->where('surat.jenis_surat', 'sehat')
                        ->whereBetween('surat.tanggal', [$from, $to])
                        ->get();
        }
        return view('medis.laporan_filter',[
            'data' => $data,
            'jenis' => $id,
        ]);
    }
}
