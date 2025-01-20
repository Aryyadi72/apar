<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\KondisiApar;
use App\Models\Lokasi;
use App\Models\Merk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class KondisiAparController extends Controller
{
    public function index()
    {
        $title = 'Kondisi Apar';

        $kondisiApars = DB::table('kondisi_apars')
            ->join('apars', 'apars.id', '=', 'kondisi_apars.id_apar')
            ->join('lokasis', 'lokasis.id', '=', 'apars.id_lokasi')
            ->join('divisis', 'divisis.id', '=', 'lokasis.id_divisi')
            ->select(
                'kondisi_apars.bulan',
                'kondisi_apars.segel',
                'kondisi_apars.jarum',
                'kondisi_apars.tabung',
                'kondisi_apars.selang',
                'kondisi_apars.nozzle',
                'kondisi_apars.judge',
                'apars.id as apar_id',
                'apars.kode_apar',
                'apars.berat',
                'apars.tanggal_pembelian',
                'lokasis.lokasi',
                'divisis.divisi'
            )
            ->get();

        return view('kondisi-apar.index', [
            'title' => $title,
            'kondisiApars' => $kondisiApars,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_apar' => 'required|integer',
            'bulan' => 'required|date_format:Y-m',
            'segel' => 'required',
            'jarum' => 'required',
            'tabung' => 'required',
            'selang' => 'required',
            'nozzle' => 'required',
            'judge' => 'required',
        ]);

        $monthInput = $request->input('bulan');

        $date = Carbon::createFromFormat('Y-m', $monthInput);
        $year = $date->year;
        $month = $date->format('F');

        $kondisiApar = new KondisiApar();
        $kondisiApar->id_apar = $request->id_apar;
        $kondisiApar->tahun = $year;
        $kondisiApar->bulan = $month;
        $kondisiApar->segel = $request->segel;
        $kondisiApar->jarum = $request->jarum;
        $kondisiApar->tabung = $request->tabung;
        $kondisiApar->selang = $request->selang;
        $kondisiApar->nozzle = $request->nozzle;
        $kondisiApar->judge = $request->judge;
        $kondisiApar->save();

        if ($kondisiApar) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil ditambahkan!');
            return redirect()->route('kondisi-apar');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil ditambahkan!');
            return redirect()->route('kondisi-apar');
        }
    }

    public function update(Request $request)
    {

    }

    public function destroy(Request $request)
    {

    }

    public function summary_kondisi_apar_perbulan()
    {
        $title = 'Sumamry Kondisi Apar Perbulan';

        // $yearNow = Carbon::now()->year;
        $yearNow = '2024';

        $summaryKondisiAparJan = KondisiApar::where('tahun', $yearNow)->where('bulan', 'January')->where('judge', 'B')->count();
        $summaryKondisiAparJanTB = KondisiApar::where('tahun', $yearNow)->where('bulan', 'January')->where('judge', 'TB')->count();
        $summaryKondisiAparJanTotal = KondisiApar::where('tahun', $yearNow)->where('bulan', 'January')->count();

        $summaryKondisiAparFeb = KondisiApar::where('tahun', $yearNow)->where('bulan', 'February')->where('judge', 'B')->count();
        $summaryKondisiAparFebTB = KondisiApar::where('tahun', $yearNow)->where('bulan', 'February')->where('judge', 'TB')->count();
        $summaryKondisiAparFebTotal = KondisiApar::where('tahun', $yearNow)->where('bulan', 'February')->count();

        $summaryKondisiAparMar = KondisiApar::where('tahun', $yearNow)->where('bulan', 'March')->where('judge', 'B')->count();
        $summaryKondisiAparMarTB = KondisiApar::where('tahun', $yearNow)->where('bulan', 'March')->where('judge', 'TB')->count();
        $summaryKondisiAparMarTotal = KondisiApar::where('tahun', $yearNow)->where('bulan', 'March')->count();

        $summaryKondisiAparApr = KondisiApar::where('tahun', $yearNow)->where('bulan', 'April')->where('judge', 'B')->count();
        $summaryKondisiAparAprTB = KondisiApar::where('tahun', $yearNow)->where('bulan', 'April')->where('judge', 'TB')->count();
        $summaryKondisiAparAprTotal = KondisiApar::where('tahun', $yearNow)->where('bulan', 'April')->count();

        $summaryKondisiAparMei = KondisiApar::where('tahun', $yearNow)->where('bulan', 'May')->where('judge', 'B')->count();
        $summaryKondisiAparMeiTB = KondisiApar::where('tahun', $yearNow)->where('bulan', 'May')->where('judge', 'TB')->count();
        $summaryKondisiAparMeiTotal = KondisiApar::where('tahun', $yearNow)->where('bulan', 'May')->count();

        $summaryKondisiAparJun = KondisiApar::where('tahun', $yearNow)->where('bulan', 'June')->where('judge', 'B')->count();
        $summaryKondisiAparJunTB = KondisiApar::where('tahun', $yearNow)->where('bulan', 'June')->where('judge', 'TB')->count();
        $summaryKondisiAparJunTotal = KondisiApar::where('tahun', $yearNow)->where('bulan', 'June')->count();

        $summaryKondisiAparJul = KondisiApar::where('tahun', $yearNow)->where('bulan', 'July')->where('judge', 'B')->count();
        $summaryKondisiAparJulTB = KondisiApar::where('tahun', $yearNow)->where('bulan', 'July')->where('judge', 'TB')->count();
        $summaryKondisiAparJulTotal = KondisiApar::where('tahun', $yearNow)->where('bulan', 'July')->count();

        $summaryKondisiAparAug = KondisiApar::where('tahun', $yearNow)->where('bulan', 'August')->where('judge', 'B')->count();
        $summaryKondisiAparAugTB = KondisiApar::where('tahun', $yearNow)->where('bulan', 'August')->where('judge', 'TB')->count();
        $summaryKondisiAparAugTotal = KondisiApar::where('tahun', $yearNow)->where('bulan', 'August')->count();

        $summaryKondisiAparSep = KondisiApar::where('tahun', $yearNow)->where('bulan', 'September')->where('judge', 'B')->count();
        $summaryKondisiAparSepTB = KondisiApar::where('tahun', $yearNow)->where('bulan', 'September')->where('judge', 'TB')->count();
        $summaryKondisiAparSepTotal = KondisiApar::where('tahun', $yearNow)->where('bulan', 'September')->count();

        $summaryKondisiAparOkt = KondisiApar::where('tahun', $yearNow)->where('bulan', 'October')->where('judge', 'B')->count();
        $summaryKondisiAparOktTB = KondisiApar::where('tahun', $yearNow)->where('bulan', 'October')->where('judge', 'TB')->count();
        $summaryKondisiAparOktTotal = KondisiApar::where('tahun', $yearNow)->where('bulan', 'October')->count();

        $summaryKondisiAparNov = KondisiApar::where('tahun', $yearNow)->where('bulan', 'November')->where('judge', 'B')->count();
        $summaryKondisiAparNovTB = KondisiApar::where('tahun', $yearNow)->where('bulan', 'November')->where('judge', 'TB')->count();
        $summaryKondisiAparNovTotal = KondisiApar::where('tahun', $yearNow)->where('bulan', 'November')->count();

        $summaryKondisiAparDes = KondisiApar::where('tahun', $yearNow)->where('bulan', 'December')->where('judge', 'B')->count();
        $summaryKondisiAparDesTB = KondisiApar::where('tahun', $yearNow)->where('bulan', 'December')->where('judge', 'TB')->count();
        $summaryKondisiAparDesTotal = KondisiApar::where('tahun', $yearNow)->where('bulan', 'December')->count();

        return view('summary.summary-kondisi-apar', [
            'title' => $title,
            'yearNow' => $yearNow,
            'summaryKondisiAparJan' => $summaryKondisiAparJan,
            'summaryKondisiAparJanTB' => $summaryKondisiAparJanTB,
            'summaryKondisiAparJanTotal' => $summaryKondisiAparJanTotal,
            'summaryKondisiAparFeb' => $summaryKondisiAparFeb,
            'summaryKondisiAparFebTB' => $summaryKondisiAparFebTB,
            'summaryKondisiAparFebTotal' => $summaryKondisiAparFebTotal,
            'summaryKondisiAparMar' => $summaryKondisiAparMar,
            'summaryKondisiAparMarTB' => $summaryKondisiAparMarTB,
            'summaryKondisiAparMarTotal' => $summaryKondisiAparMarTotal,
            'summaryKondisiAparApr' => $summaryKondisiAparApr,
            'summaryKondisiAparAprTB' => $summaryKondisiAparAprTB,
            'summaryKondisiAparAprTotal' => $summaryKondisiAparAprTotal,
            'summaryKondisiAparMei' => $summaryKondisiAparMei,
            'summaryKondisiAparMeiTB' => $summaryKondisiAparMeiTB,
            'summaryKondisiAparMeiTotal' => $summaryKondisiAparMeiTotal,
            'summaryKondisiAparJun' => $summaryKondisiAparJun,
            'summaryKondisiAparJunTB' => $summaryKondisiAparJunTB,
            'summaryKondisiAparJunTotal' => $summaryKondisiAparJunTotal,
            'summaryKondisiAparJul' => $summaryKondisiAparJul,
            'summaryKondisiAparJulTB' => $summaryKondisiAparJulTB,
            'summaryKondisiAparJulTotal' => $summaryKondisiAparJulTotal,
            'summaryKondisiAparAug' => $summaryKondisiAparAug,
            'summaryKondisiAparAugTB' => $summaryKondisiAparAugTB,
            'summaryKondisiAparAugTotal' => $summaryKondisiAparAugTotal,
            'summaryKondisiAparSep' => $summaryKondisiAparSep,
            'summaryKondisiAparSepTB' => $summaryKondisiAparSepTB,
            'summaryKondisiAparSepTotal' => $summaryKondisiAparSepTotal,
            'summaryKondisiAparOkt' => $summaryKondisiAparOkt,
            'summaryKondisiAparOktTB' => $summaryKondisiAparOktTB,
            'summaryKondisiAparOktTotal' => $summaryKondisiAparOktTotal,
            'summaryKondisiAparNov' => $summaryKondisiAparNov,
            'summaryKondisiAparNovTB' => $summaryKondisiAparNovTB,
            'summaryKondisiAparNovTotal' => $summaryKondisiAparNovTotal,
            'summaryKondisiAparDes' => $summaryKondisiAparDes,
            'summaryKondisiAparDesTB' => $summaryKondisiAparDesTB,
            'summaryKondisiAparDesTotal' => $summaryKondisiAparDesTotal,
        ]);
    }

    public function summary_kondisi_apar_perlokasi(Request $request)
    {
        $title = 'Summary Kondisi Apar Perlokasi';

        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        $divisiAll = Divisi::all();
        $allSummaryKondisiApar = [];

        foreach ($divisiAll as $divisi) {
            $summaryKondisiApar = DB::table('kondisi_apars')
                ->join('apars', 'apars.id', '=', 'kondisi_apars.id_apar')
                ->join('lokasis', 'lokasis.id', '=', 'apars.id_lokasi')
                ->join('divisis', 'divisis.id', '=', 'lokasis.id_divisi')
                ->select('divisis.divisi')
                ->addSelect(DB::raw("SUM(kondisi_apars.judge = 'B') as kondisi_b"))
                ->addSelect(DB::raw("SUM(kondisi_apars.judge = 'TB') as kondisi_tb"))
                ->where('kondisi_apars.tahun', $tahun)
                ->where('kondisi_apars.bulan', $bulan)
                ->where('kondisi_apars.judge', 'B')
                ->where('divisis.divisi', $divisi->divisi)
                ->groupBy('divisis.divisi')
                ->get();

            $allSummaryKondisiApar[] = $summaryKondisiApar;
        }

        $totatKondisiAparMerkB = collect($allSummaryKondisiApar)->sum('kondisi_b');
        $totatKondisiAparMerkTB = collect($allSummaryKondisiApar)->sum('kondisi_tb');

        return view('summary.summary-kondisi-apar-lokasi', [
            'title' => $title,
            'allSummaryKondisiApar' => $allSummaryKondisiApar,
            'summaryKondisiApar' => $summaryKondisiApar,
            'totatKondisiAparMerkB' => $totatKondisiAparMerkB,
            'totatKondisiAparMerkTB' => $totatKondisiAparMerkTB
        ]);
    }
}
