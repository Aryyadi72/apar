<?php

namespace App\Http\Controllers;

use App\Models\Apar;
use App\Models\Lokasi;
use App\Models\Merk;
use App\Models\TipeApar;
use Illuminate\Http\Request;
use DB;

class AparController extends Controller
{

    public function index()
    {
        $title = 'Apar';

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
                'merks.merk',
                'tipe_apars.tipe',
                'lokasis.lokasi',
                'divisis.divisi'
            )
            ->get();

        $merks = Merk::all();

        $tipeApars = TipeApar::all();

        $lokasis = DB::table('lokasis')
            ->join('divisis','divisis.id','=','lokasis.id_divisi')
            ->select(
                    'lokasis.id_divisi',
                    'lokasis.id as id_lokasi',
                    'lokasis.lokasi as nama_lokasi',
                    'divisis.divisi as nama_divisi'
                )
            ->get();

        return view('apar.index', [
            'title' => $title,
            'apars' => $apars,
            'merks' => $merks,
            'tipeApars' => $tipeApars,
            'lokasis' => $lokasis,
        ]);
    }

    public function create()
    {
        $title = 'Tambah Data Apar';

        $merks = Merk::all();

        $tipeApars = TipeApar::all();

        $lokasis = DB::table('lokasis')
            ->join('divisis','divisis.id','=','lokasis.id_divisi')
            ->select(
                    'lokasis.id_divisi',
                    'lokasis.id as id_lokasi',
                    'lokasis.lokasi as nama_lokasi',
                    'divisis.divisi as nama_divisi'
                )
            ->get();

        return view('apar.create', [
            'title' => $title,
            'merks' => $merks,
            'tipeApars' => $tipeApars,
            'lokasis' => $lokasis,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_apar' => 'required|string|max:255',
            'id_merk' => 'required|integer',
            'id_tipe' => 'required|integer',
            'id_lokasi' => 'required|integer',
            'berat' => 'required|string|max:255',
        ]);

        $apar = new Apar();
        $apar->kode_apar = $request->kode_apar;
        $apar->id_merk = $request->id_merk;
        $apar->id_tipe = $request->id_tipe;
        $apar->id_lokasi = $request->id_lokasi;
        $apar->berat = $request->berat;
        $apar->tanggal_pembelian = $request->tanggal_pembelian;
        $apar->save();

        if ($apar) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil ditambahkan!');
            return redirect()->route('apar');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil ditambahkan!');
            return redirect()->route('apar');
        }
    }

    public function edit($id)
    {
        $title = 'Edit Data Apar';

        $apar = Apar::findOrFail($id);

        $merks = Merk::all();

        $tipeApars = TipeApar::all();

        $lokasis = DB::table('lokasis')
            ->join('divisis','divisis.id','=','lokasis.id_divisi')
            ->select(
                    'lokasis.id_divisi',
                    'lokasis.id as id_lokasi',
                    'lokasis.lokasi as nama_lokasi',
                    'divisis.divisi as nama_divisi'
                )
            ->get();

        return view('apar.update', [
            'title' => $title,
            'merks' => $merks,
            'tipeApars' => $tipeApars,
            'lokasis' => $lokasis,
            'apar' => $apar
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_apar' => 'required|string|max:255',
            'id_merk' => 'required|integer',
            'id_tipe' => 'required|integer',
            'id_lokasi' => 'required|integer',
            'berat' => 'required|string|max:255',
        ]);

        $apar = Apar::findOrFail($id);
        $apar->kode_apar = $request->kode_apar;
        $apar->id_merk = $request->id_merk;
        $apar->id_tipe = $request->id_tipe;
        $apar->id_lokasi = $request->id_lokasi;
        $apar->berat = $request->berat;
        $apar->tanggal_pembelian = $request->tanggal_pembelian;
        $apar->save();

        if ($apar) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil ditambahkan!');
            return redirect()->route('apar');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil ditambahkan!');
            return redirect()->route('apar');
        }
    }

    public function delete($id)
    {
        $apar = Apar::findOrFail($id);
        $apar->delete();

        if ($apar) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil dihapus!');
            return redirect()->route('tipe-apar');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil dihapus!');
            return redirect()->route('tipe-apar');
        }
    }
}
