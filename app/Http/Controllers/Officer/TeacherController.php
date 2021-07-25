<?php

namespace App\Http\Controllers\Officer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.pages.users.teachers.index", [
            "teachers" => User::with('assignCourses')->role('teacher')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.users.teachers.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "first_name" => "required|string|max:255",
            "last_name" => "required|string|max:255",
            "email" => "required|email|unique:users,email",
            "image" => "nullable|file",
            "password" => "required|confirmed|string|min:8",
            "assign_course" => "nullable|array",
            "assign_course.*" => "nullable|exists:courses,id"
        ]);
        $data = [
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "status" => "active"
        ];
        if ($request->hasFile('image')) {
            $data['image'] = Storage::put("/images/teachers", $request->image);
        }
        $teacher = new User($data);
        if ($teacher->save()) {
            $teacher->assignRole("teacher");
            $teacher->assignCourses()->sync($request->assign_course);
            Toastr::success('Successfully Teacher Added', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->route("officer.teachers.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(User $teacher)
    {
        $teacher->loadMissing('assignCourses');
        return view("admin.pages.users.teachers.edit", compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(User $teacher)
    {
        $teacher->loadMissing('assignCourses');
        return view("admin.pages.users.teachers.edit", compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $teacher)
    {
        $request->validate([
            "first_name" => "required|string|max:255",
            "last_name" => "required|string|max:255",
            "email" => "required|email|unique:users,email," . $teacher->id,
            "image" => "nullable|file",
            "assign_course" => "nullable|array",
            "assign_course.*" => "nullable|exists:courses,id"
        ]);
        $data = [
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email
        ];
        if ($request->hasFile('image')) {
            if (Storage::exists($teacher->image)) {
                Storage::delete($teacher->image);
            }
            $data['image'] = Storage::put("/images/teachers", $request->image);
        }
        $teacher->assignCourses()->sync($request->assign_course);
        if ($teacher->update($data)) {
            Toastr::success('Successfully Teacher Updated', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return back();
    }

    /**
     * Update Password the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request, User $teacher)
    {
        $request->validate([
            "old_password" => "required|current_password",
            "password" => "required|confirmed"
        ]);
        $data = [
            "password" => bcrypt($request->password),
        ];
        if ($teacher->update($data)) {
            Toastr::success('Successfully Password Changed', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $teacher)
    {
        if (Storage::exists($teacher->image)) {
            Storage::delete($teacher->image);
        }
        if ($teacher->delete()) {
            Toastr::success('Successfully Teacher Deleted', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return back();
    }
}
