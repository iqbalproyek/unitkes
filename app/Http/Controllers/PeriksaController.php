<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeriksaRequest;
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
        $destinationPath = base_path('Uploads');
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
            'tanggal' => $request->tanggal ?? '-',
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function edit(Periksa $periksa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periksa $periksa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.

     * @param  \App\Models\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periksa $periksa)
    {
        $filename = Rekam::where('id_rekam', $periksa->id)->pluck('foto')->first();
        $destinationPath = base_path('Uploads');
        if(file_exists($destinationPath.'/'.$filename)){
            unlink($destinationPath.'/'.$filename);
        }
        Periksa::where('id', $periksa->id)->delete();
        notify()->success('Data Berhasil Dihapus', 'Berhasil');
        return back();
    }
}
