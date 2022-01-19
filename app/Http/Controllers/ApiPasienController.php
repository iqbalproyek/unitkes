<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiPasienController extends Controller
{
    public function index($nik)
    {
        $ch = curl_init('https://sid.polibatam.ac.id/apilogin/web/api/auth/cek-id?id='.$nik.'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($ch));

        if($result->status=="success") {
            $name = $result->data->name;
            $jabatan = $result->data->jabatan;
        }else{
            $name = '-';
            $jabatan = '-';
        }
        return response()->json([
            'nama' => $name,
            'jabatan' => $jabatan,
        ]);
    }
}
