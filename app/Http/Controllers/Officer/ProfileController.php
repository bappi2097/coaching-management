<?php

namespace App\Http\Controllers\Officer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('admin.pages.setting.profile', [
            "user" => auth()->user()
        ]);
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            "first_name" => "required|string|max:255",
            "last_name" => "required|string|max:255",
            "email" => "required|email|unique:users,email," . auth()->user()->id,
            "image" => "nullable|file"
        ]);
        $data = [
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email
        ];
        if ($request->hasFile('image')) {
            if (Storage::exists(auth()->user()->image)) {
                Storage::delete(auth()->user()->image);
            }
            $data['image'] = Storage::put("/images/officers", $request->image);
        }
        if (auth()->user()->update($data)) {
            Toastr::success('Successfully Profile Updated', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return back()->with(["user" => auth()->user()]);
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            "old_password" => "required|current_password",
            "password" => "required|confirmed"
        ]);
        $data = [
            "password" => $request->password,
        ];
        if (auth()->user()->update($data)) {
            Toastr::success('Successfully Password Changed', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return back();
    }
}
