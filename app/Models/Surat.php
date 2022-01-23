<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $table = 'surat';
    protected $dates= ['tanggal'];
    protected $fillable = [
        'tanggal',
        'no_surat',
        'jenis_surat',
    ];

    public function sakit()
    {
        return $this->hasOne(Sakit::class);
    }
}
