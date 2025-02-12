<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refill extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_apar',
        'standard_pengisian',
        'terakhir_refill',
        'next_refill'
    ];
}
