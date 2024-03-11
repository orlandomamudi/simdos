<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function dologin(Request $request) {
        // validasi
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)) {
            // buat ulang session login
            $request->session()->regenerate();

            if (auth()->user()->role_id === 1) {
                return redirect()->intended('/staff');
            } else if (auth()->user()->role_id === 2) {
                return redirect()->intended('dosen');
            } else {
                return redirect()->intended('pimpinan');
            }
        }

        // jika email/pass salah send session destroy
        return back()->with('error', 'Email atau Password Salah !!');
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
