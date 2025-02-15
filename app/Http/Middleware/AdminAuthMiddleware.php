<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {

        // $matchingRole = $user->roles->firstWhere(function ($role) {
        //     return $role->role === 'super_admin' &&
        //         $role->system === 'Collection System' &&
        //         $role->institute === 'IC';
        // });

        $user = Auth::user(); // Get logged-in user

        // if (!$user) {
        //     return redirect()->route('signin');
        // }

        // dd($user->roles->pluck('role_id'));

        if (!$user || $user->roles->pluck('role_id')->intersect($roles)->isEmpty()) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
