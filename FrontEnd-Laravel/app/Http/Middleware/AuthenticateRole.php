<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = session('user');

        if (!$user) {
            return redirect('/login');
        }

        // Bandingkan nama_role dari session
        if (!in_array($user['nama_role'], $roles)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
