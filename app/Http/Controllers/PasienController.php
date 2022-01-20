<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        return view('medis.pasien',[
            'pasien' => Pasien::orderby('id', 'desc')->get(),
        ]);
    }

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

    public function show(Pasien $pasien)
    {
        return view('medis.rekam',[
            'pasien' => $pasien,
        ]);
    }

    public function update(Request $request, Pasien $pasien)
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
        Pasien::find($pasien->id)->update($request->all());
        notify()->success('Data Berhasil Diedit', 'Berhasil');
        return back();
    }

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
