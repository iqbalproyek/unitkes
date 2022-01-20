<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekam extends Model
{
    use HasFactory;
    protected $table = 'rekam';
    protected $fillable = [
            'id_rekam',
            'keluhan',
            'alergi',
            'pemeriksaan',
            'tindakan',
            'terapi',
            'foto',
    ];
}
