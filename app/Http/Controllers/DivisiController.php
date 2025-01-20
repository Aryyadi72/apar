<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {
        $title = 'Divisi';

        $divisis = Divisi::all();

        return view('divisi.index', [
            'title' => $title,
            'divisis' => $divisis
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'divisi' => 'required|string|max:255',
        ]);

        $divisi = new Divisi();
        $divisi->divisi = $request->divisi;
        $divisi->save();

        if ($divisi) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil ditambahkan!');
            return redirect()->route('divisi');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil ditambahkan!');
            return redirect()->route('divisi');
        }

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'divisi' => 'required|string|max:255',
        ]);

        $divisi = Divisi::findOrFail($id);

        $divisi->divisi = $request->divisi;
        $divisi->save();

        if ($divisi) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil ditambahkan!');
            return redirect()->route('divisi');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil ditambahkan!');
            return redirect()->route('divisi');
        }
    }

    public function delete($id)
    {
        $divisi = Divisi::findOrFail($id);
        $divisi->delete();

        if ($divisi) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil dihapus!');
            return redirect()->route('divisi');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil dihapus!');
            return redirect()->route('divisi');
        }
    }
}
