<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sehatd extends Model
{
    use HasFactory;
    protected $table = 'sehatdetail';
    protected $fillable = [
        'id_sehat',
        'tinggi',
        'berat',
        'tekanan_darah',
        'gol_darah',
        'buta_warna',
    ];
}
