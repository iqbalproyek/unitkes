<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluar extends Model
{
    use HasFactory;
    protected $table = 'obatkeluar';
    protected $fillable = [
        'id_obat',
        'tgl_keluar',
        'jmlh_keluar',
        'nik',
        'nama_pasien',
    ];

    public function obatkeluar()
    {
        return $this->belongsTo(Stok::class);
    }
}
