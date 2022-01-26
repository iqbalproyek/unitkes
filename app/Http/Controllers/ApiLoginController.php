<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiLoginController extends Controller
{
    public function index()
    {
        return view('auth.login_api');
    }

    public function create(Request $request)
    {
        $token = '9Kylnkoreo7zASjqMh4eEx0Hx9b4h5e2';
        $data = array(
            "username" => $request->username,
            "password" => $request->password,
            "token" => $token,
        );

        $ch = curl_init('http://sid.polibatam.ac.id/apilogin/web/api/auth/login');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($ch));

        if($result->status == "success") {
            session()->put('id', $result->data->id);
            session()->put('Username', $result->data->username);
            session()->put('Name', $result->data->name);
            session()->put('Email', $result->data->email);
            session()->put('Jabatan', $result->data->jabatan);
            session()->put('NIM', $result->data->nim_nik_unit);
            $name = $result->data->name;

            notify()->success("Selamat Datang $name", "Login Berhasil");
            return redirect('/');
        }else{
            notify()->error("User tidak ditemukan", "Login Gagal");
            return redirect()->route('api.login');
        }

    }

    public function destroy(Request $request)
    {
        $request->session()->invalidate();
        notify()->success('Anda berhasil Logout');
        return redirect()->route('dash');
    }
}
