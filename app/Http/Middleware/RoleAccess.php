<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // dd(Auth::user());

        if( Auth::check() && (!$request->user()->hasRole($role))){ 
            // dd(Auth::user()->roles, $role);
            return abort(403, 'Vaza daqui meu querido...');
        }

        

        // abort_if(Auth::check() && !$request->user()->hasRole('Super Admin'), 403, 'Vaza daqui meu querido...'); // --> Verifica se o usuario esta logado e se ele é um Super Admin, caso contrário, temos o erro. 

        return $next($request);
    }
}
