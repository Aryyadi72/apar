<?php

namespace App\Http\Controllers;

use App\Models\Apar;
use App\Models\ChecklistApar;
use Illuminate\Http\Request;
use DB;

class ChecklistAparController extends Controller
{
    public function index()
    {
        $title = 'Checklist Apar';

        $checklistApars = DB::table('checklist_apars')
            ->join('apars', 'apars.id', '=', 'checklist_apars.id_apar')
            ->join('lokasis', 'lokasis.id', '=', 'apars.id_lokasi')
            ->select(
                'checklist_apars.tanggal_pengecekan',
                'checklist_apars.kondisi_segel',
                'checklist_apars.posisi_jarum',
                'checklist_apars.kondisi_selang',
                'checklist_apars.kondisi_tabung',
                'checklist_apars.kondisi_air',
                'checklist_apars.kondisi_karung',
                'checklist_apars.kondisi_box',
                'checklist_apars.lain_lain',
                'checklist_apars.komentar',
                'lokasis.lokasi',
                'apars.kode_apar'
            )
            ->selectRaw("DATE_FORMAT(checklist_apars.tanggal_pengecekan, '%M') as bulan")
            ->orderBy('checklist_apars.tanggal_pengecekan')
            ->get()
            ->groupBy('bulan');

        // dd($checklistApars);

        return view('checklist-apar.index', [
            'title' => $title,
            'checklistApars' => $checklistApars
        ]);
    }

    public function create()
    {
        $title = 'Tambah Checklist Apar';

        $apars = DB::table('apars')
            ->join('lokasis', 'lokasis.id', '=', 'apars.id_lokasi')
            ->join('divisis', 'divisis.id', '=', 'lokasis.id_divisi')
            ->select(
                'apars.id as id_apar',
                'lokasis.lokasi',
                'divisis.divisi',
            )
            ->get();

        return view('checklist-apar.create', [
            'title' => $title,
            'apars' => $apars
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_apar' => 'required|integer',
            'tanggal_pengecekan' => 'required|date',
            'kondisi_segel' => 'required|string|max:255',
            'posisi_jarum' => 'required|string|max:255',
            'kondisi_selang' => 'required|string|max:255',
            'kondisi_tabung' => 'required|string|max:255',
            'kondisi_air' => 'required|string|max:255',
            'kondisi_karung' => 'required|string|max:255',
            'kondisi_box' => 'required|string|max:255',
            'approve_petugas' => 'required|string|max:255',
        ]);

        $checklistApar = new ChecklistApar();
        $checklistApar->id_apar = $request->id_apar;
        $checklistApar->tanggal_pengecekan = $request->tanggal_pengecekan;
        $checklistApar->kondisi_segel = $request->kondisi_segel;
        $checklistApar->posisi_jarum = $request->posisi_jarum;
        $checklistApar->kondisi_selang = $request->kondisi_selang;
        $checklistApar->kondisi_tabung = $request->kondisi_tabung;
        $checklistApar->kondisi_air = $request->kondisi_air;
        $checklistApar->kondisi_karung = $request->kondisi_karung;
        $checklistApar->kondisi_box = $request->kondisi_box;
        $checklistApar->lain_lain = $request->lain_lain;
        $checklistApar->komentar = $request->komentar;
        $checklistApar->approve_petugas = $request->approve_petugas;
        $checklistApar->save();

        if ($checklistApar) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil ditambahkan!');
            return redirect()->route('checklist-apar');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil ditambahkan!');
            return redirect()->route('checklist-apar');
        }
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
