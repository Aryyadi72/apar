<?php

namespace App\Http\Controllers;

use App\Models\TipeApar;
use Illuminate\Http\Request;

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
}
