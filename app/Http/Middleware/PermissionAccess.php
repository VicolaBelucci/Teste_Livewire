<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PermissionAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission): Response
    {
        // dd($request->user()->hasPermission($permission), $permission, $request->user()->can($permission));
        abort_if(
            Auth::check() && !$request->user()->can($permission),
            403,
            "Você não tem permissão, cara..."
        );
        // dd($request->user()->hasPermission($permission), $permission, $request->user()->can($permission));

        return $next($request);
    }
}
