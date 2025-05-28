<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

   public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Kirim data login ke backend Node.js
        $response = Http::post('http://localhost:5000/api/auth/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->failed()) {
            // Jika gagal, kembalikan error ke view login
            return back()->withErrors(['login' => $response->json('message') ?? 'Login failed']);
        }

        $data = $response->json();

        if ($response->successful()) {
            // Simpan data user dari response Node.js ke session Laravel
            session([
                'user' => [
                    'nama' => $data['nama'],
                    'email' => $data['email'],
                    'nama_role' => $data['nama_role'],
                    'id_role' => $data['role'],
                    'token' => $data['token'],
                ]
            ]);

        }

        // Redirect berdasarkan role id
        switch ($data['role']) {
            case 1:
                return redirect('/admin/index');
            case 2:
                return redirect('/panitia/index');
            case 3:
                return redirect('/keuangan/index');
            case 4:
                return redirect('/peserta/index');
            default:
                return redirect('/dashboard');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush(); // Hapus session
        return redirect('/');
    } //
}
