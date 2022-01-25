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

    // update obat keluar dan update stok
    public function update(Request $request, $id)
    {
        $request->validate([
            'tgl_keluar2' => ['required'],
            'jmlh_keluar2' => ['required'],
        ]);

        $id_stok = Keluar::where('id', $id)->pluck('id_obat')->first();
        $jumlah_sekarang = Stok::where('id', $id_stok)->pluck('jumlah')->first();
        $jumlah_keluar_sekarang = Keluar::where('id', $id)->pluck('jmlh_keluar')->first();

        if($request->jmlh_keluar2 >= $jumlah_keluar_sekarang){
            $selisih = $request->jmlh_keluar2 - $jumlah_keluar_sekarang;
            $stok = $jumlah_sekarang - $selisih;
        }else{
            $selisih = $jumlah_keluar_sekarang - $request->jmlh_keluar2;
            $stok = $jumlah_sekarang + $selisih;
        }

        Keluar::where('id', $id)->update([
            'tgl_keluar' => $request->tgl_keluar2,
            'jmlh_keluar' => $request->jmlh_keluar2,
        ]);
        Stok::where('id', $id_stok)->update([
            'jumlah' => $stok,
        ]);

        notify()->success('Data berhasil Diedit', 'berhasil');
        return back();
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
