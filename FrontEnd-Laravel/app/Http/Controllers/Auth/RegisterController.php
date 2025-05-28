<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validasi sisi frontend Laravel
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Kirim request POST ke backend Node.js
        $response = Http::post('http://localhost:5000/api/auth/register', [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            // Jika sukses, redirect atau tampil pesan sukses
            return redirect('/login')->with('success', $response['message']);
        }

        // Jika gagal, ambil pesan error dari response Node.js dan kembali ke form
        $errorMessage = $response->json('message') ?? 'Registrasi gagal';

        return redirect()->back()->withInput()->withErrors(['error' => $errorMessage]);

        return view('auth.login');
    }
}
