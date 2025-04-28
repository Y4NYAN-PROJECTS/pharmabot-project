<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && is_null(Auth::user()->approved_at)) {
            Auth::logout();
            return redirect()->route('login')->with('toast', [
                'icon' => 'warning',
                'title' => 'Wait for Admin Approval',
            ]);
        }

        return $next($request);
    }

}

