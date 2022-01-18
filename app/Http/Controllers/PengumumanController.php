<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pengumuman', [
            'pengumuman' => Pengumuman::orderby('id', 'desc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        return response()->json([
            'data' => Pengumuman::find($pengumuman)->first(),
        ]);
        // $data = Pengumuman::find($pengumuman);
        // return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => ['required'],
            'tanggal' => ['required'],
            'isi' => ['required'],
        ]);
        Pengumuman::find($pengumuman->id)->update($request->all());
        notify()->success('Data Berhasil Diedit', 'Berhasil');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        Pengumuman::find($pengumuman->id)->delete();
        notify()->success('Data Berhasil Dihapus', 'Berhasil');
        return back();
    }
}
