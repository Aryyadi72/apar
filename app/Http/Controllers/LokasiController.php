<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use DB;

class LokasiController extends Controller
{
    public function index()
    {
        $title = 'Lokasi';

        $lokasis = DB::table('lokasis')
            ->join('divisis','divisis.id','=','lokasis.id_divisi')
            ->select(
                    'lokasis.id_divisi',
                    'lokasis.id as id_lokasi',
                    'lokasis.lokasi as nama_lokasi',
                    'divisis.divisi as nama_divisi'
                )
            ->get();

        $divisis = Divisi::all();

        return view('lokasi.index', [
            'title' => $title,
            'divisis' => $divisis,
            'lokasis' => $lokasis
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_divisi' => 'required|integer|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        $lokasi = new Lokasi();
        $lokasi->id_divisi = $request->id_divisi;
        $lokasi->lokasi = $request->lokasi;
        $lokasi->save();

        if ($lokasi) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil ditambahkan!');
            return redirect()->route('lokasi');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil ditambahkan!');
            return redirect()->route('lokasi');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_divisi' => 'required|integer|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        $lokasi = Lokasi::findOrFail($id);
        $lokasi->id_divisi = $request->id_divisi;
        $lokasi->lokasi = $request->lokasi;
        $lokasi->save();

        if ($lokasi) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil ditambahkan!');
            return redirect()->route('lokasi');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil ditambahkan!');
            return redirect()->route('lokasi');
        }
    }

    public function delete($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();

        if ($lokasi) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil dihapus!');
            return redirect()->route('lokasi');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil dihapus!');
            return redirect()->route('lokasi');
        }
    }
}
