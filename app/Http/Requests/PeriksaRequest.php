<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeriksaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_pasien' => ['required'],
            'tanggal' => ['required'],
            't_badan' => ['required', 'numeric'],
            'b_badan' => ['required', 'numeric'],
            'tekanan_darah' => ['required', 'numeric'],
            'tekanan_darah2' => ['required', 'numeric'],
            'pulse' => ['required', 'numeric'],
            'hemoglobin' => ['required', 'numeric'],
            'asam_urat' => ['required', 'numeric'],
            'gula_darah' => ['required', 'numeric'],
            'kolesterol' => ['required', 'numeric'],
            'saturasi' => ['required', 'numeric'],

            'keluhan' => ['required'],
            'alergi' => ['required'],
            'pemeriksaan' => ['required'],
            'tindakan' => ['required'],
            'terapi' => ['required'],
            'foto' => ['required','mimes:jpeg,png,bmp','max:2048'],
        ];
    }
}
