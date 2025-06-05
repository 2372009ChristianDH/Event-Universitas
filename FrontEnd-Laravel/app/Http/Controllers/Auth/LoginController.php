<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User; // pastikan model User ada
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Ambil user berdasarkan email
        $user = User::with('role')->where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            // Gagal login
            return back()->withErrors(['login' => 'Email atau password salah'])->withInput();
        }

        // Simpan user ke session manual (atau gunakan Auth::login($user))
        session([
            'user' => [
                'id' => $user->id_user,
                'nama' => $user->nama,
                'email' => $user->email,
                'nama_role' => $user->role->nama_role ?? '',
                'id_role' => $user->id_role,
            ]
        ]);

        // Redirect berdasarkan role
        switch ($user->id_role) {
            case 1:
                return redirect('/admin/index')->with('success', 'Berhasil login, Selamat datang ' . $user->nama) . '!';
            case 2:
                return redirect('/panitia/index')->with('success', 'Berhasil login, Selamat datang ' . $user->nama . '!');
            case 3:
                return redirect('/keuangan/index')->with('success', 'Berhasil login, Selamat datang ' . $user->nama) . '!';
            case 4:
                return redirect('/peserta/index')->with('success', 'Berhasil login, Selamat datang ' . $user->nama). '!';
            default:
                return redirect('/login')->withErrors(['login' => 'Role tidak dikenali']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
