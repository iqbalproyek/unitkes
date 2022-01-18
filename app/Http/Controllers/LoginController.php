<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function create(Request $request)
    {
        $attributes = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($attributes)){
            return redirect('dashboard');
        }
        throw ValidationException::withMessages([
            'username' => 'User Tidak Ditemukan'
        ]);
    }
}
