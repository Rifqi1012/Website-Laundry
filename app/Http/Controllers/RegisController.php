<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLogin;

class RegisController extends Controller
{
    public function view()
    {
        return view('Login.regis');
    }

    public function register(Request $request)
    {
        $customMessages = [
            'username.unique' => 'Username sudah digunakan.',
            'password.confirmed' => 'Password yang diinputkan harus sama.',
        ];

        $request->validate([
            'username' => 'required|unique:data_login',
            'password' => 'required|min:6|confirmed',
        ], $customMessages);

        $dataLogin = new DataLogin();
        $dataLogin->username = $request->username;
        $dataLogin->password = bcrypt($request->password);
        $dataLogin->save();

        return redirect('/regis')->with('success', 'Registrasi berhasil!');
    }
}
