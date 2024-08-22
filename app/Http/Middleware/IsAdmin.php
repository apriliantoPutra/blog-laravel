<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // jika blm login maka error 403
        if(Auth::guest()){
            abort(403);
        }
        // jika username yg login bukan Putra maka error 403
        // if(auth()->user()->username !== 'Putra'){
        //     abort(403);
        // }

        // jika bukan is_admin==1, error 403
        if(!Auth::user()->is_admin){
            abort(403);
        }
        return $next($request);
    }
}
