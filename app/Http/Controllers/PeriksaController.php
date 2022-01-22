<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeriksaRequest;
use App\Models\Pasien;
use App\Models\Periksa;
use App\Models\Rekam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PeriksaController extends Controller
{
    public function store(PeriksaRequest $request)
    {
        $image = $request->file('foto');

        if(isset($image)) {
        $fileName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = base_path('/public/Uploads');
        $image->move($destinationPath, $fileName);
        }else{
            $fileName = "-";
        }

        $periksa = Periksa::create([
            'id_pasien' => $request->id_pasien,
            'tanggal' => $request->tanggal,
            't_badan' => $request->t_badan ?? '-',
            'b_badan' => $request->b_badan ?? '-',
            'tekanan_darah' => $request->tekanan_darah ?? '-',
            'tekanan_darah2' => $request->tekanan_darah2 ?? '-',
            'pulse' => $request->pulse ?? '-',
            'hemoglobin' => $request->hemoglobin ?? '-',
            'asam_urat' => $request->asam_urat ?? '-',
            'gula_darah' => $request->gula_darah ?? '-',
            'kolesterol' => $request->kolesterol ?? '-',
            'saturasi' => $request->saturasi ?? '-',
        ]);

        $id = $periksa->id;
        Rekam::create([
            'id_rekam' => $id,
            'keluhan' => $request->keluhan ?? '-',
            'alergi' => $request->alergi ?? '-',
            'pemeriksaan' => $request->pemeriksaan ?? '-',
            'tindakan' => $request->tindakan ?? '-',
            'terapi' => $request->terapi ?? '-',
            'foto' => $fileName,
        ]);
        notify()->success('Data Berhasil Ditambahkan', 'Berhasil');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function show(Periksa $periksa)
    {
        return view('medis.rekam_detail', [
            'periksa' => $periksa,
            'rekam' => Rekam::where('id_rekam', $periksa->id)->firstOrFail(),
            'pasien' => Pasien::where('id', $periksa->id_pasien)->pluck('kelamin')->first(),
        ]);
    }

    public function update(Request $request, Periksa $periksa)
    {
        $request->validate([
            'tanggal' => ['required'],
        ]);
        Periksa::find($periksa->id)->update([
            'tanggal' => $request->tanggal,
            't_badan' => $request->t_badan ?? '-',
            'b_badan' => $request->b_badan ?? '-',
            'tekanan_darah' => $request->tekanan_darah ?? '-',
            'tekanan_darah2' => $request->tekanan_darah2 ?? '-',
            'pulse' => $request->pulse ?? '-',
            'hemoglobin' => $request->hemoglobin ?? '-',
            'asam_urat' => $request->asam_urat ?? '-',
            'gula_darah' => $request->gula_darah ?? '-',
            'kolesterol' => $request->kolesterol ?? '-',
            'saturasi' => $request->saturasi ?? '-',
        ]);
        notify()->success('Data Berhasil Diedit', 'Berhasil');
        return back();
    }

    public function destroy(Periksa $periksa)
    {
        $filename = Rekam::where('id_rekam', $periksa->id)->pluck('foto')->first();
        $destinationPath = base_path('/public/Uploads');
        if(file_exists($destinationPath.'/'.$filename)){
            unlink($destinationPath.'/'.$filename);
        }
        Periksa::where('id', $periksa->id)->delete();
        notify()->success('Data Berhasil Dihapus', 'Berhasil');
        return back();
    }

    public function updaterekam(Request $request, Periksa $periksa)
    {
        $request->validate([
            'foto' => ['mimes:jpeg,png,bmp','max:2048'],
        ]);
        $image = $request->file('foto');
        $filelama = Rekam::where('id_rekam', $periksa->id)->pluck('foto')->first();

            if(isset($image)) {
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = base_path('/public/Uploads');
            $image->move($destinationPath, $fileName);
            if(file_exists($destinationPath.'/'.$filelama)){
                unlink($destinationPath.'/'.$filelama);
            }
            }else{
                $fileName = $filelama;
            }
            Rekam::where('id_rekam', $periksa->id)->update([
                'keluhan' => $request->keluhan ?? '-',
                'alergi' => $request->alergi ?? '-',
                'pemeriksaan' => $request->pemeriksaan ?? '-',
                'tindakan' => $request->tindakan ?? '-',
                'terapi' => $request->terapi ?? '-',
                'foto' => $fileName,
            ]);
        notify()->success('Data Berhasil Diedit', 'Berhasil');
        return back();
    }

    function bukti(Periksa $periksa)
    {
        return view('medis.buktiperiksa',[
            'periksa' => $periksa,
            'pasien' => Pasien::where('id', $periksa->id_pasien)->first(),
        ]);
    }
}
