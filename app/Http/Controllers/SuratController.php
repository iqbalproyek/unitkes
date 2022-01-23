<?php

namespace App\Http\Controllers;

use App\Http\Requests\SakitRequest;
use App\Http\Requests\SehatRequest;
use App\Models\Sakit;
use App\Models\Sehat;
use App\Models\Sehatd;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratController extends Controller
{
    // view surat sakit
    public function index()
    {
        $sakit = DB::table('sakit')
        ->join('surat', 'surat.id', '=', 'id_surat')
        ->where('jenis_surat', 'sakit')
        ->get();
        return view('medis.suratsakit', [
            'sakit' => $sakit,
        ]);
    }

    // tambah data surat sakit
    public function store(SakitRequest $request)
    {
        $surat = Surat::create([
            'tanggal' => $request->tanggal ?? '-',
            'no_surat' => $request->no_surat ?? '-',
            'jenis_surat' => $request->jenis_surat ?? '-',
        ]);
        $id = $surat->id;

        Sakit::create([
            'id_surat' => $id,
            'nim' => $request->nik ?? '-',
            'nama' => $request->nama ?? '-',
            'umur' => $request->umur ?? '-',
            'unit' => $request->unit ?? '-',
            'mulai_tgl' => $request->mulai_tgl ?? '-',
            'akhir_tgl' => $request->akhir_tgl ?? '-',
            'total_izin' => $request->total_izin ?? '-',
        ]);
        notify()->success('Data Berhasil Ditambahkan', 'Berhasil');
        return back();
    }

    // data per id surat sakit
    public function show($id)
    {
        return view('medis.detail_sakit', [
            'surat' => Surat::where('id', $id)->first(),
            'sakit' => Sakit::where('id_surat', $id)->first(),
        ]);
    }

    // update surat
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => ['required'],
            'no_surat' => ['required',],
        ]);
        Surat::where('id', $id)->update([
            'tanggal' => $request->tanggal,
            'no_surat' => $request->no_surat,
        ]);
        notify()->success('Data Berhasil Diedit', 'Berhasil');
        return back();
    }

    // update surat sakit
    public function updatesakit(Request $request, $id)
    {
        $request->validate([
            'umur' => ['required'],
            'unit' => ['required'],
            'mulai_tgl' => ['required'],
            'akhir_tgl' => ['required'],
            'total_izin' => ['required'],
        ]);
        Sakit::where('id_surat', $id)->update([
            'umur' => $request->umur ?? '-',
            'unit' => $request->unit ?? '-',
            'mulai_tgl' => $request->mulai_tgl ?? '-',
            'akhir_tgl' => $request->akhir_tgl ?? '-',
            'total_izin' => $request->total_izin ?? '-',
        ]);
        notify()->success('Data Berhasil Diedit', 'Berhasil');
        return back();
    }

    // hapus surat
    public function destroy($id)
    {
        Surat::where('id', $id)->delete();
        notify()->success('Data Berhasil Dihapus', 'Berhasil');
        return back();
    }

    // print surat sakit
    public function suratsakit($id)
    {
        return view('medis.sakit_bukti', [
            'surat' => Surat::find($id)->first(),
            'sakit' => Sakit::where('id_surat', $id)->first(),
        ]);
    }

    // bagian surat sehat

    // view surat sehat
    public function indexsehat()
    {
        $sehat = DB::table('sehat')
        ->join('surat', 'surat.id', '=', 'id_surat')
        ->where('jenis_surat', 'sehat')
        ->get();

        return view('medis.suratsehat', [
            'sehat' => $sehat,
        ]);
    }

    // tambah data surat sehat
    public function storesehat(SehatRequest $request)
    {
        $surat = Surat::create([
            'tanggal' => $request->tanggal ?? '-',
            'no_surat' => $request->no_surat ?? '-',
            'jenis_surat' => $request->jenis_surat ?? '-',
        ]);
        $id = $surat->id;

        $sehat = Sehat::create([
            'id_surat' => $id,
            'nama' => $request->nama ?? '-',
            'tempat_lahir' => $request->tempat_lahir ?? '-',
            'ttl' => $request->ttl ?? '-',
            'pekerjaan' => $request->pekerjaan ?? '-',
            'untuk' => $request->untuk ?? '-',
        ]);
        $id_detail = $sehat->id;

        Sehatd::create([
            'id_sehat' => $id_detail,
            'tinggi' => $request->tinggi ?? '-',
            'berat' => $request->berat ?? '-',
            'tekanan_darah' => $request->tekanan_darah ?? '-',
            'gol_darah' => $request->gol_darah ?? '-',
            'buta_warna' => $request->buta_warna ?? '-',
        ]);
        notify()->success('Data Berhasil Ditambahkan', 'Berhasil');
        return back();
    }

    // show data per id surat sehat
    public function showsehat($id)
    {
        $id_sehat = Sehat::where('id_surat', $id)->pluck('id')->first();
        return view('medis.detail_sehat', [
            'surat' => Surat::where('id', $id)->first(),
            'sehat' => Sehat::where('id_surat', $id)->first(),
            'sehatd' => Sehatd::where('id_sehat', $id_sehat)->first(),
        ]);
    }

    // update surat sehat
    public function updatesehat(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required'],
            'tempat_lahir' => ['required'],
            'ttl' => ['required'],
            'pekerjaan' => ['required'],
            'untuk' => ['required'],
        ]);
        Sehat::where('id_surat', $id)->update([
            'nama' => $request->nama ?? '-',
            'tempat_lahir' => $request->tempat_lahir ?? '-',
            'ttl' => $request->ttl ?? '-',
            'pekerjaan' => $request->pekerjaan ?? '-',
            'untuk' => $request->untuk ?? '-',
        ]);
        notify()->success('Data Berhasil Diedit', 'Berhasil');
        return back();
    }

    // update seurat sehat keterangan
    public function updatesehatd(Request $request, $id)
    {
        $request->validate([
            'tinggi' => ['required'],
            'berat' => ['required'],
            'tekanan_darah' => ['required'],
            'gol_darah' => ['required'],
            'buta_warna' => ['required'],
        ]);
        Sehatd::where('id_sehat', $id)->update([
            'tinggi' => $request->tinggi ?? '-',
            'berat' => $request->berat ?? '-',
            'tekanan_darah' => $request->tekanan_darah ?? '-',
            'gol_darah' => $request->gol_darah ?? '-',
            'buta_warna' => $request->buta_warna ?? '-',
        ]);
        notify()->success('Data Berhasil Diedit', 'Berhasil');
        return back();
    }

}
