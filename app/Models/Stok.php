<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;
    protected $table = 'obatstok';
    protected $fillable = [
        'nama_obat',
        'sediaan',
        'satuan',
        'jumlah',
        'expired',
        'guna',
    ];
}
