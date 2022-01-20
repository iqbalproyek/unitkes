<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        return view('admin.pengumuman', [
            'pengumuman' => Pengumuman::orderby('id', 'desc')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => ['required'],
            'tanggal' => ['required'],
            'isi' => ['required'],
        ]);
        Pengumuman::create($request->all());
        notify()->success('Data Berhasil Ditambahkan', 'Berhasil');
        return back();
    }

    public function edit(Pengumuman $pengumuman)
    {
        return response()->json([
            'data' => Pengumuman::find($pengumuman)->first(),
        ]);
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul2' => ['required'],
            'tanggal2' => ['required'],
            'isi2' => ['required'],
        ]);
        Pengumuman::find($pengumuman->id)->update([
            'judul' => $request->judul2,
            'tanggal' => $request->tanggal2,
            'isi' => $request->isi2,
        ]);
        notify()->success('Data Berhasil Diedit', 'Berhasil');
        return back();
    }

    public function destroy(Pengumuman $pengumuman)
    {
        Pengumuman::find($pengumuman->id)->delete();
        notify()->success('Data Berhasil Dihapus', 'Berhasil');
        return back();
    }
}
