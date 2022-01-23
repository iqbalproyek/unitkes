<?php

namespace App\Http\Controllers;

use App\Http\Requests\SakitRequest;
use App\Models\Sakit;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratController extends Controller
{
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

    public function show($id)
    {
        return view('medis.detail_sakit', [
            'surat' => Surat::where('id', $id)->first(),
            'sakit' => Sakit::where('id_surat', $id)->first(),
        ]);
    }

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

    public function destroy($id)
    {
        Surat::where('id', $id)->delete();
        notify()->success('Data Berhasil Dihapus', 'Berhasil');
        return back();
    }

    public function suratsakit($id)
    {
        return view('medis.sakit_bukti', [
            'surat' => Surat::find($id)->first(),
            'sakit' => Sakit::where('id_surat', $id)->first(),
        ]);
    }
}
