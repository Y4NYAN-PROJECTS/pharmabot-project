<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\View\View;
use App\Models\Medicine;
use App\Models\User;

class PendingController extends Controller
{
    public function list()
    {
        $pendings = User::where('approved_at', NULL)->get();
        return view('admin.pages.account-pending', compact('pendings'));
    }

    public function approve($id)
    {
        User::where('id', $id)->update([
            'approved_at' => Carbon::now()
        ]);

        return back()->with('toast', [
            'icon' => 'success',
            'title' => 'Account Approved',
        ])->onlyInput('school_id');
    }

    public function decline($id)
    {
        User::where('id', $id)->update([
            'deleted_at' => Carbon::now()
        ]);

        return back()->with('toast', [
            'icon' => 'success',
            'title' => 'Account Declined',
        ])->onlyInput('school_id');
    }
}
