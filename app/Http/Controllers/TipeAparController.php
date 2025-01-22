<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\TipeApar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class TipeAparController extends Controller
{
    public function index()
    {
        $title = 'Tipe Apar';

        $tipeApars = TipeApar::all();

        return view('tipe-apar.index', [
            'title' => $title,
            'tipeApars' => $tipeApars,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required|string|max:255',
        ]);

        $tipe = new TipeApar();
        $tipe->tipe = $request->tipe;
        $tipe->save();

        if ($tipe) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil ditambahkan!');
            return redirect()->route('tipe-apar');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil ditambahkan!');
            return redirect()->route('tipe-apar');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipe' => 'required|string|max:255',
        ]);

        $tipe = TipeApar::findOrFail($id);
        $tipe->tipe = $request->tipe;
        $tipe->save();

        if ($tipe) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil ditambahkan!');
            return redirect()->route('tipe-apar');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil ditambahkan!');
            return redirect()->route('tipe-apar');
        }
    }

    public function delete($id)
    {
        $tipe = TipeApar::findOrFail($id);
        $tipe->delete();

        if ($tipe) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil dihapus!');
            return redirect()->route('tipe-apar');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil dihapus!');
            return redirect()->route('tipe-apar');
        }
    }

    public function summary_jenis_apar(Request $request)
    {
        $title = 'Summary Jenis Apar';

        $summaryTipeApar = DB::table('apars')
            ->join('lokasis', 'lokasis.id', '=', 'apars.id_lokasi')
            ->join('divisis', 'divisis.id', '=', 'lokasis.id_divisi')
            ->join('tipe_apars', 'tipe_apars.id', '=', 'apars.id_tipe')

            ->select(
                'divisis.divisi',
                DB::raw("SUM(tipe_apars.tipe = 'Foam') as foam"),
                DB::raw("SUM(tipe_apars.tipe = 'Powder') as powder"),
                DB::raw("SUM(tipe_apars.tipe = 'CO') as co")
            )
            ->groupBy('divisis.divisi')
            ->get();

            $totals = [
                'foam' => $summaryTipeApar->sum('foam'),
                'powder' => $summaryTipeApar->sum('powder'),
                'co' => $summaryTipeApar->sum('co'),
                'jumlah' => $summaryTipeApar->sum(function ($data) {
                    return $data->foam + $data->powder + $data->co;
                }),
            ];

        return view('summary.summary-tipe-apar', [
            'title' => $title,
            'summaryTipeApar' => $summaryTipeApar,
            'totals' => $totals,
        ]);
    }
}
