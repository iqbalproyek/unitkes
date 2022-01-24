<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    use HasFactory;
    protected $table = 'obatmasuk';
    protected $fillable = [
        'id_obat',
        'tgl_masuk',
        'jmlh_masuk',
    ];

    public function obatmasuk()
    {
        return $this->belongsTo(Stok::class);
    }
}
