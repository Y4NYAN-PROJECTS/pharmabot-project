<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Str;

use App\Models\Medicine;

class MedicineController extends Controller
{
    public function medicinePage()
    {
        $medicines = Medicine::all();
        return view('admin.pages.medicine', compact('medicines'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        Medicine::create([
            'medicine_code' => Str::random(100),
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.medicine');
    }

    public function delete($id)
    {
        Medicine::where('id', $id)->delete();
        return redirect()->route('admin.medicine');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'update_title' => ['required', 'string', 'max:255'],
            'update_description' => ['required', 'string'],
        ]);

        Medicine::where('id', $id)->update([
            'title' => $request->update_title,
            'description' => $request->update_description,
        ]);
        return redirect()->route('admin.medicine');
    }
}
