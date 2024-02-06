<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }
    public function authenticate(Request $request)
    {
        // validasi data request yang mau di autentikasi
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);
        // attempt ke database kalau berhasil arahkan ke dashboard
        if (Auth::attempt($credentials)) {
            // regenerate session baru untuk menghindari session fixation hacking
            $request->session()->regenerate();

            // arahkan ke dashboard
            return redirect()->intended('/');
        }

        // kalau gagal arahkan ke halaman login (sebelumnya) beserta pesan errornya
        return back()->with('loginError', "Login Failed!");
    }
    public function logout(Request $request)
    {
        Auth::logout();

        // invalidate session
        $request->session()->invalidate();

        // regenerate token session
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
