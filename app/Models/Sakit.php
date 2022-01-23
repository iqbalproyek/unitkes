<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sakit extends Model
{
    use HasFactory;
    protected $table = 'sakit';
    protected $dates= ['mulai_tgl', 'akhir_tgl'];
    protected $fillable = [
        'id_surat',
        'nim',
        'nama',
        'umur',
        'unit',
        'mulai_tgl',
        'akhir_tgl',
        'total_izin',
    ];
}
