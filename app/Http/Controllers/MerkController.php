<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;

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
}
