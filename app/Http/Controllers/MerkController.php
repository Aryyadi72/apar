<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;
use DB;

class MerkController extends Controller
{
    public function index()
    {
        $title = 'Merk';

        $merks = Merk::all();

        return view('merk.index', [
            'title' => $title,
            'merks' => $merks,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk' => 'required|string|max:255',
        ]);

        $merk = new Merk();
        $merk->merk = $request->merk;
        $merk->save();

        if ($merk) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil ditambahkan!');
            return redirect()->route('merk');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil ditambahkan!');
            return redirect()->route('merk');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'merk' => 'required|string|max:255',
        ]);

        $merk = Merk::findOrFail($id);
        $merk->merk = $request->merk;
        $merk->save();

        if ($merk) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil ditambahkan!');
            return redirect()->route('merk');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil ditambahkan!');
            return redirect()->route('merk');
        }
    }

    public function delete($id)
    {
        $merk = Merk::findOrFail($id);
        $merk->delete();

        if ($merk) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil dihapus!');
            return redirect()->route('merk');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil dihapus!');
            return redirect()->route('merk');
        }
    }

    public function summary_merk_apar()
    {
        $title = 'Summary Merk Apar';

        $merkAll = Merk::all();
        $allSummaryMerkApar = [];

        foreach ($merkAll as $merk) {
            $summaryMerkApar = DB::table('kondisi_apars')
                ->join('apars', 'apars.id', '=', 'kondisi_apars.id_apar')
                ->join('merks', 'merks.id', '=', 'apars.id_merk')
                ->select('merks.merk')
                ->addSelect(DB::raw("SUM(kondisi_apars.judge = 'B') as kondisi_b"))
                ->addSelect(DB::raw("SUM(kondisi_apars.judge = 'TB') as kondisi_tb"))
                ->where('kondisi_apars.judge', 'B')
                ->where('merks.merk', $merk->merk)
                ->groupBy('merks.merk')
                ->get();

            $allSummaryMerkApar[] = $summaryMerkApar;
        }

        // dd($summaryMerkApar);

        $totatKondisiAparMerkB = collect($allSummaryMerkApar)->sum('kondisi_b');
        $totatKondisiAparMerkTB = collect($allSummaryMerkApar)->sum('kondisi_tb');

        // dd($summaryMerkApar, $totatKondisiAparMerkB, $totatKondisiAparMerkTB);

        return view('summary.summary-merk-apar', [
            'title' => $title,
            'summaryMerkApar' => $summaryMerkApar,
            'allSummaryMerkApar' => $allSummaryMerkApar,
            'totatKondisiAparMerkB' => $totatKondisiAparMerkB,
            'totatKondisiAparMerkTB' => $totatKondisiAparMerkTB,
        ]);
    }
}
