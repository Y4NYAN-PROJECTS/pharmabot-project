<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Usertype;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return $this->redirectBasedOnUserType($user);
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return $this->redirectBasedOnUserType($user);
    }

    protected function redirectBasedOnUserType($user): RedirectResponse
    {
        return match ($user->user_type) {
            Usertype::Admin => redirect()->route('admin.dashboard', ['verified' => 1]),
            Usertype::Student => redirect()->route('student.dashboard', ['verified' => 1]),
            default => redirect()->url('/', ['verified' => 1]),
        };
    }
}
