<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function store()
    {
        Auth::logout();
        notify()->success('Anda berhasil Logout');
        return redirect()->route('dash');
    }
}
