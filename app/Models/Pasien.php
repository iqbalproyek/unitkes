<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasien';
    protected $fillable = [
        'nik',
        'nama',
        'hp',
        'unit',
        'umur',
        'tgllahir',
        'tempat',
        'kelamin',
        'kategori',
        'email',
    ];
}
