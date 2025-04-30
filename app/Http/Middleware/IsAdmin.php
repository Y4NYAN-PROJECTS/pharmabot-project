<?php

namespace App\Http\Middleware;

use App\Enums\Usertype;
use Auth;
use Closure;
use Illuminate\Http\Request;
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
        // Perform Before
        if (Auth::check() && Auth::user()->user_type === Usertype::Admin) {
            return $next($request);
        }

        return back()->with('toast', [
            'icon' => 'error',
            'title' => 'Access Denied. Unauthorized!',
        ]);
    }

}

