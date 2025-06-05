<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $roleFilter = $request->query('role');
        $emailSearch = $request->query('email');

        $query = User::with('role');

        if ($roleFilter) {
            $query->whereHas('role', function ($q) use ($roleFilter) {
                $q->where('nama_role', $roleFilter);
            });
        }

        if ($emailSearch) {
            $query->where('email', 'like', '%' . $emailSearch . '%');
        }

        $users = $query->get();
        $roles = Role::all();

        return view('admin.user.index', compact('users', 'roles', 'roleFilter', 'emailSearch'));
    }


    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|string|min:8',
            'id_role' => 'required|integer|exists:role,id_role', // pastikan role valid
        ]);

        // Simpan user ke database
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'id_role' => $request->id_role,
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.user.edit', compact('user', 'roles'));
    }



    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'id_role' => 'required|integer|exists:role,id_role', // pastikan role valid
        ]);

        // Cari user berdasarkan ID
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        // Update role user
        $user->id_role = $request->id_role;
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Akses user berhasil diperbarui.');
    }
}
