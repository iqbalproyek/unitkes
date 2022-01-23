<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sehat extends Model
{
    use HasFactory;
    protected $table = 'sehat';
    protected $dates= ['ttl'];
    protected $fillable = [
        'id_surat',
        'nama',
        'tempat_lahir',
        'ttl',
        'pekerjaan',
        'untuk',
    ];

    public function sehatd()
    {
        return $this->hasOne(Sehatd::class);
    }
}
