<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('admin.pages.setting.profile');
    }
    public function updateProfile(Request $request)
    {
        // 
    }
    public function updatePassword(Request $request)
    {
        // 
    }
}
