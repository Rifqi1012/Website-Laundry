<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\DataLogin;


class LoginController extends Controller
{
    public function view()
    {
        return view("Login.login");
    }
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...

            return redirect()->intended('datautama'); // Ubah sesuai kebutuhan
        }

        // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
        return redirect()->back()
            ->withInput($request->only('username'))
            ->withErrors(['login_error' => 'Username atau Password salah.']);
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Logout user
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); // Redirect ke halaman login setelah logout
    }
}
