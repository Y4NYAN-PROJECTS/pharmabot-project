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
    public function landing()
    {
        $admins = User::where('user_type', 'admin')->where('approved_at', NULL)->get();
        return view('admin.pages.admin', compact('admins'));
    }

    public function approve($id)
    {
        User::where('id', $id)->update([
            'approved_at' => Carbon::now()
        ]);

        return redirect()->route('admin.admin-list');
    }

    public function delete($id)
    {
        Medicine::where('id', $id)->delete();
        return redirect()->route('admin.admin-list');
    }

}
