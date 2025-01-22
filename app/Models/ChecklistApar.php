<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistApar extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_pengecekan',
        'id_apar',
        'kondisi_segel',
        'posisi_jarum',
        'kondisi_selang',
        'kondisi_tabung',
        'kondisi_air',
        'kondisi_karung',
        'kondisi_box',
        'lain_lain',
        'komentar',
        'approve_petugas',
        'approve_asst_sub_div',
        'approve_asst_dp',
        'approve_hse_dp',
        'approve_mng',
    ];
}
