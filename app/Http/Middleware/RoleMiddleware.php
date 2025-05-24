<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next,  ...$roles)
    {
        $userRole = Auth::user()->role->role ?? null;

    // Deteksi mode: jika parameter diawali "except:", artinya pengecualian
    if (count($roles) === 1 && str_starts_with($roles[0], 'except:')) {
        $excludedRoles = explode(',', substr($roles[0], strlen('except:')));
        if (in_array($userRole, $excludedRoles)) {
            abort(403, 'Unauthorized');
        }
    } else {
        if (!in_array($userRole, $roles)) {
            abort(403, 'Unauthorized');
        }
    }

    return $next($request);
    }
}
