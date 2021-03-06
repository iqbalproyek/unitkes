<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasienRequest extends FormRequest
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
        ];
    }
}
