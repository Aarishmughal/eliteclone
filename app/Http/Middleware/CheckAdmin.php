<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->is_admin) {
            return $next($request); // Admins allowed
        }
        return redirect('/')->with('error', 'Access denied!'); // Redirect others
    }
}