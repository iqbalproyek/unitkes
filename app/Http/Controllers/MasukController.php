<?php

namespace App\Http\Controllers;

use App\Models\Masuk;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasukController extends Controller
{
    // view masuk
    public function index()
    {
        $masuk = DB::table('obatstok')
        ->join('obatmasuk', 'obatmasuk.id_obat', '=', 'obatstok.id')
        ->orderby('obatmasuk.id', 'desc')
        ->get();

        return view('farmasi.masuk',[
            'stok' => Stok::orderby('id', 'desc')->get(),
            'masuk' => $masuk,
        ]);
    }

    // tambah masuk dan update jumlah stok
    public function tambahstok(Request $request, $id)
    {
        $request->validate([
            'id_obat' => ['required'],
            'tgl_masuk' => ['required'],
            'jmlh_masuk' => ['required'],
        ]);
        $jumlah_sekarang = Stok::where('id', $id)->pluck('jumlah')->first();
        $saat_ini = $jumlah_sekarang + $request->jmlh_masuk;
        Masuk::create($request->all());
        Stok::where('id', $id)->update([
            'jumlah' => $saat_ini,
        ]);
        notify()->success('Data berhasil Ditambahkan', 'berhasil');
        return back();
    }

    // get data edit
    public function edit($id)
    {
        $masuk = DB::table('obatstok')
        ->join('obatmasuk', 'obatmasuk.id_obat', '=', 'obatstok.id')
        ->Where('obatmasuk.id', $id)
        ->first();
        return response()->json([
            'data' => $masuk,
        ]);
    }

    // update dan update stok
    public function update(Request $request, $id)
    {
        $request->validate([
            'tgl_masuk2' => ['required'],
            'jmlh_masuk2' => ['required'],
        ]);
        $id_stok = Masuk::where('id', $id)->pluck('id_obat')->first();
        $jumlah_sekarang = Stok::where('id', $id_stok)->pluck('jumlah')->first();
        $jumlah_masuk_sekarang = Masuk::where('id', $id)->pluck('jmlh_masuk')->first();

        if($request->jmlh_masuk >= $jumlah_masuk_sekarang){
            $selisih = $request->jmlh_masuk2 - $jumlah_masuk_sekarang;
            $stok = $jumlah_sekarang + $selisih;
        }else{
            $selisih =  $jumlah_masuk_sekarang - $request->jmlh_masuk2;
            $stok = $jumlah_sekarang - $selisih;
        }

        Masuk::where('id', $id)->update([
            'tgl_masuk' => $request->tgl_masuk2,
            'jmlh_masuk' => $request->jmlh_masuk2,
        ]);
        Stok::where('id', $id_stok)->update([
            'jumlah' => $stok,
        ]);

        notify()->success('Data berhasil Diedit', 'berhasil');
        return back();
    }

    // hapus masuk dan update stok
    public function destroy(Request $request, $id)
    {
        $id_stok = Masuk::where('id', $id)->pluck('id_obat')->first();
        $jumlah_sekarang = Stok::where('id', $id_stok)->pluck('jumlah')->first();
        $jumlah_tambah = Masuk::where('id', $id)->pluck('jmlh_masuk')->first();
        $jumlah_update = $jumlah_sekarang - $jumlah_tambah;

        Stok::where('id', $id_stok)->update([
            'jumlah' => $jumlah_update,
        ]);
        Masuk::where('id', $id)->delete();
        notify()->success('Data berhasil Dihapus', 'berhasil');
        return back();
    }
}
