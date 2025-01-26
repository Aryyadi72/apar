<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        $title = 'Login';

        return view('login', [
            'title' => $title
        ]);
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            Session::put('email', $user->email);
            Session::put('id', $user->id);
            Session::put('level', $user->level);
            Session::put('name', $user->name);
            Session::put('id_divisi', $user->id_divisi);

            toastr()->closeOnHover(true)->closeDuration(10)->success('Login successful. Welcome to the dashboard!');
            return redirect()->route('dashboard');
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Email / Password salah');
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        toastr()->closeOnHover(true)->closeDuration(10)->success('Logout successful. See you next time!');
        return redirect()->route('login');
    }
}
