<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('pengguna.index');
    }

    public function obat()
    {
        return view('pengguna.data_obat', [
            'obat' => Stok::orderby('id', 'desc')->get(),
        ]);
    }
}
