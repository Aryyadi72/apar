<?php

namespace App\Http\Controllers;

use App\Models\Refill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Session;

class RefillController extends Controller
{
    public function index()
    {
        $title = 'Refill Apar';

        $divisiId = Session::get('id_divisi');

        if ($divisiId == null) {
            $refills = DB::table('refills')
                ->join('apars', 'apars.id', '=', 'refills.id_apar')
                ->join('merks', 'merks.id', '=', 'apars.id_merk')
                ->join('tipe_apars', 'tipe_apars.id', '=', 'apars.id_tipe')
                ->join('lokasis', 'lokasis.id', '=', 'apars.id_lokasi')
                ->join('divisis', 'divisis.id', '=', 'lokasis.id_divisi')
                ->select(
                    'refills.standard_pengisian',
                    'refills.terakhir_refill',
                    'refills.next_refill',
                    'apars.id as apar_id',
                    'apars.kode_apar',
                    'apars.berat',
                    'apars.tanggal_pembelian',
                    'merks.merk',
                    'tipe_apars.tipe',
                    'lokasis.lokasi',
                    'divisis.divisi'
                )
                ->get();
        } else {
            $refills = DB::table('refills')
                ->join('apars', 'apars.id', '=', 'refills.id_apar')
                ->join('merks', 'merks.id', '=', 'apars.id_merk')
                ->join('tipe_apars', 'tipe_apars.id', '=', 'apars.id_tipe')
                ->join('lokasis', 'lokasis.id', '=', 'apars.id_lokasi')
                ->join('divisis', 'divisis.id', '=', 'lokasis.id_divisi')
                ->select(
                    'refills.standard_pengisian',
                    'refills.terakhir_refill',
                    'refills.next_refill',
                    'apars.id as apar_id',
                    'apars.kode_apar',
                    'apars.berat',
                    'apars.tanggal_pembelian',
                    'merks.merk',
                    'tipe_apars.tipe',
                    'lokasis.lokasi',
                    'divisis.divisi'
                )
                ->where('divisis.id', $divisiId)
                ->get();
        }



        return view('refill.index', [
            'title' => $title,
            'refills' => $refills,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_apar' => 'required|integer',
            'terakhir_refill' => 'required|date',
        ]);

        if ($request->tipe == 'CO') {
            $standardPengisian = 10;
            $nextRefill = Carbon::parse($request->terakhir_refill)->addDays(120 * 30)->timezone('Asia/Makassar')->format('Y-m-d');
        } else {
            $standardPengisian = 2;
            $nextRefill = Carbon::parse($request->terakhir_refill)->addDays(2 * 365)->timezone('Asia/Makassar')->format('Y-m-d');
        }

        // dd($request->all(), $standardPengisian, $nextRefill);

        $refill = new Refill();
        $refill->id_apar = $request->id_apar;
        $refill->standard_pengisian = $standardPengisian;
        $refill->terakhir_refill = $request->terakhir_refill;
        $refill->next_refill = $nextRefill;
        $refill->save();

        if ($refill) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil ditambahkan!');
            return redirect()->route('refill');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil ditambahkan!');
            return redirect()->route('refill');
        }
    }

    public function update(Request $request)
    {

    }

    public function destroy(Request $request)
    {

    }
}
