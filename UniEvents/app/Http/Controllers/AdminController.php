<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Kegiatan;
use App\Models\RegistrasiKegiatan;

class AdminController extends Controller
{
    public function index()
    {
        // Total Users
        $totalUsers = User::count();

        // Regular Members (Peserta)
        $regularMembers = User::whereHas('role', function ($query) {
            $query->where('nama_role', 'Peserta');
        })->count();

        // Committee Members (Panitia)
        $committeeCount = User::whereHas('role', function ($query) {
            $query->where('nama_role', 'Panitia');
        })->count();

        // Finance Team Members (Keuangan)
        $financeCount = User::whereHas('role', function ($query) {
            $query->where('nama_role', 'Keuangan');
        })->count();

        // Active Events
        $activeEvents = Kegiatan::where('status', 'Sedang Berlangsung')->count();

        // Growth placeholders (isi dengan logic riil jika diperlukan)
        $eventGrowth = 12;
        $userGrowth = 5;
        $financeGrowth = 2;

        $eventsThisWeek = Kegiatan::whereBetween('tanggal_mulai', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $eventsThisMonth = Kegiatan::whereMonth('tanggal_mulai', now()->month)->count();


        // Total Registrations
        $totalRegistrations = RegistrasiKegiatan::count();

        // Recent Activities
        $recentActivities = RegistrasiKegiatan::with('user', 'detailKegiatan.kegiatan')
            ->orderBy('id_user', 'desc') // Urutkan berdasarkan ID terbaru
            ->take(5)
            ->get()
            ->map(function ($item) {
                return (object)[
                    'description' => "<strong>{$item->user->nama}</strong> mendaftar ke kegiatan <strong>{$item->detailKegiatan->kegiatan->nama_kegiatan}</strong>",
                    'icon' => 'fa-user-plus',
                    'color' => 'blue',
                    'time' => 'Baru saja' // karena tidak ada waktu, kita kasih static
                ];
            });


        // Team Members: gabungkan panitia dan keuangan
        $teamMembers = User::whereHas('role', function ($query) {
            $query->whereIn('nama_role', ['Panitia', 'Keuangan']);
        })->get();

        $userDistribution = [
            'Peserta' => $regularMembers,
            'Panitia' => $committeeCount,
            'Keuangan' => $financeCount,
        ];

        return view('admin.index', compact(
            'totalUsers',
            'regularMembers',
            'committeeCount',
            'financeCount',
            'activeEvents',
            'eventGrowth',
            'userGrowth',
            'financeGrowth',
            'eventsThisWeek',
            'eventsThisMonth',
            'totalRegistrations',
            'recentActivities',
            'teamMembers',
            'userDistribution'
        ));
    }


    public function indexUser(Request $request)
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

    public function delete($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus.');
    }
}
