<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('medis.pasien',[
            'pasien' => Pasien::orderby('id', 'desc')->get(),
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
            'nik' => ['required', 'numeric'],
            'nama' => ['required'],
            'hp' => ['required', 'numeric'],
            'unit' => ['required'],
            'umur' => ['required', 'numeric'],
            'tgllahir' => ['required'],
            'tempat' => ['required'],
            'kelamin' => ['required'],
            'kategori' => ['required'],
            'email' => ['required', 'email'],
        ]);
        Pasien::create($request->all());
        notify()->success('Data berhasil Ditambahkan', 'Berhasil');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        Pasien::where('id', $pasien->id)->delete();
        notify()->success('Data berhasil Dihapus', 'berhasil');
        return back();
    }

    public function filter($filter)
    {
        return view('medis.pasien_filter', [
            'pasien' => Pasien::where('kategori', $filter)->get(),
            'head' => $filter,
        ]);
    }
}
