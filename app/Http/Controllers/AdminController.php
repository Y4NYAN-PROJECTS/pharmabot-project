<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Medicine;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function list()
    {
        $admins = User::where('user_type', 'admin')->whereNotNull('approved_at')->get();
        return view('admin.pages.account-admin', compact('admins'));
    }

    public function softDelete($id)
    {
        User::where('id', $id)->update([
            'deleted_at' => Carbon::now()
        ]);

        return back()->with('toast', [
            'icon' => 'success',
            'title' => 'Account Deleted',
        ])->onlyInput('school_id');
    }
}
