<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SakitRequest extends FormRequest
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

            'nik' => ['required'],
            'nama' => ['required'],
            'umur' => ['required'],
            'unit' => ['required'],
            'mulai_tgl' => ['required'],
            'akhir_tgl' => ['required'],
            'total_izin' => ['required'],
        ];
    }
}
