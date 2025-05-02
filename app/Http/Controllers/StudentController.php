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

class StudentController extends Controller
{
    public function list()
    {
        $students = User::where('user_type', 'student')->whereNotNull('approved_at')->get();
        return view('admin.pages.students', compact('students'));
    }

    public function pending()
    {
        $students = User::where('user_type', 'student')->where('approved_at', NULL)->get();
        return view('admin.pages.students-pending', compact('students'));
    }


    public function approve($id)
    {
        User::where('id', $id)->update([
            'approved_at' => Carbon::now()
        ]);

        return redirect()->route('admin.account-list');
    }

    public function delete($id)
    {
        Medicine::where('id', $id)->delete();
        return redirect()->route('admin.account-list');
    }

}
