<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SehatRequest extends FormRequest
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
            'tanggal' => ['required'],
            'no_surat' => ['required', 'unique:surat,no_surat'],
            'jenis_surat' => ['required'],

            'nama' => ['required'],
            'tempat_lahir' => ['required'],
            'ttl' => ['required'],
            'pekerjaan' => ['required'],
            'untuk' => ['required'],

            'tinggi' => ['required'],
            'berat' => ['required'],
            'tekanan_darah' => ['required'],
            'gol_darah' => ['required'],
            'buta_warna' => ['required'],
        ];
    }
}
