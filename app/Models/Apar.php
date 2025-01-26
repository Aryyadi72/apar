<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_divisi',
        'id_merk',
        'id_tipe',
        'berat',
        'tanggal_pembelian',
        'latitude',
        'longitude'
    ];
}
