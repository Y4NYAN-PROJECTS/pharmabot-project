<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Usertype;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('index.pages.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'school_id' => ['required', 'string', 'max:255'],
            'password' => ['required'],
        ]);

        $remember = $request->filled('remember');
        $credentials = [
            'school_id' => $request->school_id,
            'password' => $request->password,
            'user_type' => $request->user_type,
        ];

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            $user = Auth::user();
            return match ($user->user_type) {
                Usertype::Admin => redirect()->route('admin.dashboard'),
                Usertype::Student => redirect()->route('student.dashboard'),
            };
        } else {
            return back()->with('toast', [
                'icon' => 'error',
                'title' => 'Incorrect credentials.',
            ])->onlyInput('school_id');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}

