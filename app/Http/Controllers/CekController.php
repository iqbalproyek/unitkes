<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekController extends Controller
{
    // cek role login
    public function __invoke(Request $request)
    {
        $role = Auth::user()->role;
        $name = Auth::user()->name;
        if($role == "admin"){
            notify()->success("Selamat Datang $name", "Login Berhasil");
            return redirect()->route('pengumuman.index');
        }else if($role == "medis"){
            notify()->success("Selamat Datang $name", "Login Berhasil");
            return redirect()->route('dashboard.medis');
        }else if($role == "farmasi"){
            notify()->success("Selamat Datang $name", "Login Berhasil");
            return redirect()->route('farmasi');
        }else{
            return back();
        }
    }
}
