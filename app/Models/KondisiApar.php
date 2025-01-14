<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiApar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_apar',
        'bulan',
        'segel',
        'jarum',
        'tabung',
        'selang',
        'nozzle',
        'judge'
    ];
}
