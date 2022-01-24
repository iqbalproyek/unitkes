<?php

namespace App\Http\Controllers;

use App\Models\Keluar;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeluarController extends Controller
{
    // view keluar
    public function index()
    {
        $keluar = DB::table('obatstok')
        ->join('obatkeluar', 'obatkeluar.id_obat', '=', 'obatstok.id')
        ->orderby('obatkeluar.id', 'desc')
        ->get();

        return view('farmasi.keluar', [
            'stok' => Stok::orderby('id', 'desc')->get(),
            'keluar' => $keluar,
        ]);
    }

    public function tambahstok2(Request $request, $id)
    {
        $request->validate([
            'id_obat' => ['required'],
            'tgl_keluar' => ['required'],
            'jmlh_keluar' => ['required'],
            'nik' => ['required'],
            'nama_pasien' => ['required'],
        ]);
        $jumlah_sekarang = Stok::where('id', $id)->pluck('jumlah')->first();
        $saat_ini = $jumlah_sekarang - $request->jmlh_keluar;
        Keluar::create($request->all());
        Stok::where('id', $id)->update([
            'jumlah' => $saat_ini,
        ]);
        notify()->success('Data berhasil Ditambahkan', 'berhasil');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keluar  $keluar
     * @return \Illuminate\Http\Response
     */
    public function show(Keluar $keluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keluar  $keluar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $keluar = DB::table('obatstok')
        ->join('obatkeluar', 'obatkeluar.id_obat', '=', 'obatstok.id')
        ->Where('obatkeluar.id', $id)
        ->first();
        return response()->json([
            'data' => $keluar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keluar  $keluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keluar $keluar)
    {
        //
    }

    // hapus keluar
    public function destroy(Request $request, $id)
    {
        $id_stok = Keluar::where('id', $id)->pluck('id_obat')->first();
        $jumlah_sekarang = Stok::where('id', $id_stok)->pluck('jumlah')->first();
        $jumlah_kurang = Keluar::where('id', $id)->pluck('jmlh_keluar')->first();
        $jumlah_update = $jumlah_sekarang + $jumlah_kurang;

        Stok::where('id', $id_stok)->update([
            'jumlah' => $jumlah_update,
        ]);
        Keluar::where('id', $id)->delete();
        notify()->success('Data berhasil Dihapus', 'berhasil');
        return back();
    }
}
