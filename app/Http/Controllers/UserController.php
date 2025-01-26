<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index()
    {
        $title = 'User';

        $users = DB::table('users')
            ->leftJoin('divisis', 'divisis.id', '=', 'users.id_divisi')
            ->select(
                'users.id as id_user',
                'users.name',
                'users.email',
                'users.password',
                'users.level',
                'users.id_divisi',
                'divisis.id as divisi_id',
                'divisis.divisi'
            )
            ->get();

        $divisis = Divisi::all();

        return view('user.index', [
            'title' => $title,
            'users' => $users,
            'divisis' => $divisis
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:255',
            'level' => 'required|string|max:255',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->level = $request->level;
        $user->id_divisi = $request->id_divisi;
        $user->save();

        if ($user) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil ditambahkan!');
            return redirect()->route('user');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil ditambahkan!');
            return redirect()->route('user');
        }

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'level' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);

        if ($request->password == null) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->level = $request->level;
            $user->id_divisi = $request->id_divisi;
        } else {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->level = $request->level;
            $user->id_divisi = $request->id_divisi;
        }

        $user->save();

        if ($user) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil ditambahkan!');
            return redirect()->route('user');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil ditambahkan!');
            return redirect()->route('user');
        }
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        if ($user) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Data berhasil dihapus!');
            return redirect()->route('user');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Data tidak berhasil dihapus!');
            return redirect()->route('user');
        }
    }
}
