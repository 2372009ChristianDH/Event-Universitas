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

            $query = User::with('role');

            if ($roleFilter) {
                $query->whereHas('role', function ($q) use ($roleFilter) {
                    $q->where('nama_role', $roleFilter);
                });
            }

            $users = $query->get();
            $roles = Role::all();

            return view('admin.user.index', compact('users', 'roles', 'roleFilter'));
        }

    public function create(){
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    

}
