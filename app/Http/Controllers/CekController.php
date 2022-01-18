<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $role = Auth::user()->role;
        if($role == "admin"){
            // alert()->success('Success','Login Berhasil')->autoClose(1000);
            notify()->success('Login Berhasil');
            return redirect()->route('pengumuman.index');
        }else if($role == "medis"){
            // alert()->success('Success','Login Berhasil')->autoClose(1000);
            notify()->success('Login Berhasil');
            return redirect()->route('medis');
        }else if($role == "farmasi"){
            // alert()->success('Success','Login Berhasil')->autoClose(1000);
            notify()->success('Login Berhasil');
            return redirect()->route('farmasi');
        }else{
            return back();
        }
    }
}
