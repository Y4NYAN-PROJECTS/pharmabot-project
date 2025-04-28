<?php

namespace App\Http\Middleware;

use App\Enums\Usertype;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Perform Before
        if (Auth::check() && Auth::user()->user_type === Usertype::Student) {
            return $next($request);
        }

        return $next($request);
    }

}

