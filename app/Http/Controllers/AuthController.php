<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginView()
    {
        $data['title'] = "Masuk";
        // $data['state'] = 'Login';
        return view('login', $data);
    }

    public function signIn(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $admin = Admin::where('username', $username)->where('password', $password)->first();
        $guru = Guru::where('username', $username)->where('password', $password)->first();
        $siswa = Siswa::where('username', $username)->where('password', $password)->first();

        if ($admin) {
            session()->put('user', $admin);
            session()->put('role', 'admin');
            return redirect()->route('admin.berandaView');
        }
        if ($guru) {
            session()->put('user', $guru);
            session()->put('role', 'guru');
            return redirect()->route('guru.berandaView');
        }

        if ($siswa) {
            session()->put('user', $siswa);
            session()->put('role', 'siswa');
            return redirect()->route('siswa.berandaView');
        }
        
        return redirect()->route('auth.loginView')->with('error', 'Username atau password salah');
    }
    public function signOut()
    {
        session()->forget('user');
        return redirect()->route('auth.loginView');
    }
}
