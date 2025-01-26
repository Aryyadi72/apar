<?php

namespace App\Http\Controllers;

use App\Models\Apar;
use App\Models\Merk;
use App\Models\TipeApar;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Dashboard";

        $apars = DB::table('apars')
            ->join('merks', 'merks.id', '=', 'apars.id_merk')
            ->join('tipe_apars', 'tipe_apars.id', '=', 'apars.id_tipe')
            ->join('lokasis', 'lokasis.id', '=', 'apars.id_lokasi')
            ->join('divisis', 'divisis.id', '=', 'lokasis.id_divisi')
            ->select(
                'apars.id as apar_id',
                'apars.kode_apar',
                'apars.berat',
                'apars.tanggal_pembelian',
                'apars.latitude',
                'apars.longitude',
                'merks.merk',
                'tipe_apars.tipe',
                'lokasis.lokasi',
                'divisis.divisi'
            )
            ->get();

            // dd($apars);

        $totalApar = Apar::count();
        $totalJenisApar = TipeApar::count();
        $totalMerkApar = Merk::count();

        return view('dashboard', [
            'title' => $title,
            'totalApar' => $totalApar,
            'totalJenisApar' => $totalJenisApar,
            'totalMerkApar' => $totalMerkApar,
            'apars' => $apars
        ]);
    }
}
