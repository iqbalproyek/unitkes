<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasienRequest;
use App\Models\Pasien;
use App\Models\Periksa;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        return view('medis.pasien',[
            'pasien' => Pasien::orderby('id', 'desc')->get(),
        ]);
    }

    public function store(PasienRequest $request)
    {
        Pasien::create($request->all());
        notify()->success('Data berhasil Ditambahkan', 'Berhasil');
        return back();
    }

    public function show(Pasien $pasien)
    {
        $id = Pasien::find($pasien)->pluck('id');
        return view('medis.rekam',[
            'pasien' => $pasien,
            'periksa' => Periksa::where('id_pasien', $id)->get(),
        ]);
    }

    public function update(PasienRequest $request, Pasien $pasien)
    {
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
