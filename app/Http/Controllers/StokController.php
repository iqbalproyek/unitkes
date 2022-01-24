<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    // view stok obat
    public function index()
    {
        return view('farmasi.stok', [
            'stok' => Stok::orderby('id', 'desc')->get(),
        ]);
    }

    // tambah stok
    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => ['required'],
            'sediaan' => ['required'],
            'satuan' => ['required'],
            'jumlah' => ['required'],
            'expired' => ['required'],
            'guna' => ['required'],
        ]);
        Stok::create($request->all());
        notify()->success('Data Berhasil Ditambahkan', 'Berhasil');
        return back();
    }

    // get data edit stok
    public function edit(Stok $stok)
    {
        return response()->json([
            'data' => Stok::find($stok)->first(),
        ]);
    }

    // update stok
    public function update(Request $request, Stok $stok)
    {
        $request->validate([
            'nama_obat2' => ['required'],
            'sediaan2' => ['required'],
            'satuan2' => ['required'],
            'expired2' => ['required'],
            'guna2' => ['required'],
        ]);
        Stok::find($stok->id)->update([
            'nama_obat' => $request->nama_obat2,
            'sediaan' => $request->sediaan2,
            'satuan' => $request->satuan2,
            'expired' => $request->expired2,
            'guna' => $request->guna2,
        ]);
        notify()->success('Data Berhasil Diedit', 'Berhasil');
        return back();
    }

    // hapus stok
    public function destroy(Stok $stok)
    {
        Stok::where('id', $stok->id)->delete();
        notify()->success('Data Berhasil Dihapus', 'Berhasil');
        return back();
    }
    
}
