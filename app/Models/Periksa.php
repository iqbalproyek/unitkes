<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
    use HasFactory;
    protected $table = 'periksa';
    // protected $with = ['pasien'];
    protected $fillable = [
        'id_pasien',
        'tanggal',
        't_badan',
        'b_badan',
        'tekanan_darah',
        'tekanan_darah2',
        'pulse',
        'hemoglobin',
        'asam_urat',
        'gula_darah',
        'kolesterol',
        'saturasi',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function rekam()
    {
        return $this->hasOne(Rekam::class);
    }
}
