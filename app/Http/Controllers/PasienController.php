<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasienRequest;
use App\Models\Pasien;
use App\Models\Periksa;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // view pasien
    public function index()
    {
        return view('medis.pasien',[
            'pasien' => Pasien::orderby('id', 'desc')->get(),
        ]);
    }

    // tambah pasien
    public function store(PasienRequest $request)
    {
        Pasien::create($request->all());
        notify()->success('Data berhasil Ditambahkan', 'Berhasil');
        return back();
    }

    // detail data pasien per id
    public function show(Pasien $pasien)
    {
        $id = Pasien::find($pasien)->pluck('id');
        return view('medis.rekam',[
            'pasien' => $pasien,
            'periksa' => Periksa::where('id_pasien', $id)->orderby('id', 'desc')->get(),
        ]);
    }

    // update data pasien
    public function update(PasienRequest $request, Pasien $pasien)
    {
        Pasien::find($pasien->id)->update($request->all());
        notify()->success('Data Berhasil Diedit', 'Berhasil');
        return back();
    }

    // hapus pasien
    public function destroy(Pasien $pasien)
    {
        Pasien::where('id', $pasien->id)->delete();
        notify()->success('Data berhasil Dihapus', 'berhasil');
        return back();
    }

    // filter data pasien per kategori
    public function filter($filter)
    {
        return view('medis.pasien_filter', [
            'pasien' => Pasien::where('kategori', $filter)->orderby('id', 'desc')->get(),
            'head' => $filter,
        ]);
    }
}
