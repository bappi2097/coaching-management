<?php

namespace App\Http\Controllers\Officer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.pages.users.students.index", [
            "students" => User::with("guardian")->role('student')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.users.students.create");
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
            "guardian_first_name" => "required|string|max:255",
            "guardian_last_name" => "required|string|max:255",
            "email" => "required|email|unique:users,email",
            "image" => "nullable|file",
            "password" => "required|confirmed|string|min:8"
        ]);
        $data = [
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "status" => "active"
        ];

        $data_guardian = [
            "first_name" => $request->guardian_first_name,
            "last_name" => $request->guardian_last_name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "status" => "active"
        ];
        if ($request->hasFile('image')) {
            $data['image'] = Storage::put("/images/students", $request->image);
        }
        $student = new User($data);
        if ($student->save()) {
            $student->assignRole("student");
            $guardian = new User($data_guardian);
            $guardian->user_id = $student->id;
            $guardian->save();
            $guardian->assignRole('guardian');
            Toastr::success('Successfully student Added', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->route("officer.students.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $student
     * @return \Illuminate\Http\Response
     */
    public function show(User $student)
    {
        $student->loadMissing("guardian");
        return view("admin.pages.users.students.edit", compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(User $student)
    {
        $student->loadMissing("guardian");
        return view("admin.pages.users.students.edit", compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $student)
    {
        $request->validate([
            "first_name" => "required|string|max:255",
            "last_name" => "required|string|max:255",
            "guardian_first_name" => "required|string|max:255",
            "guardian_last_name" => "required|string|max:255",
            "email" => "required|string",
            "image" => "nullable|file"
        ]);
        $data = [
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email
        ];
        $data_guardian = [
            "first_name" => $request->guardian_first_name,
            "last_name" => $request->guardian_last_name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "status" => "active"
        ];
        if ($request->hasFile('image')) {
            if (Storage::exists($student->image)) {
                Storage::delete($student->image);
            }
            $data['image'] = Storage::put("/images/students", $request->image);
        }
        if ($student->update($data)) {
            $student->guardian()->update($data_guardian);
            Toastr::success('Successfully student Updated', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return back();
    }

    /**
     * Update Password the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $student
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request, User $student)
    {
        $request->validate([
            "old_password" => "required|current_password",
            "password" => "required|confirmed"
        ]);
        $data = [
            "password" => bcrypt($request->password),
        ];
        if ($student->update($data)) {
            $student->guardian()->update($data);
            Toastr::success('Successfully Password Changed', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $student)
    {
        if (Storage::exists($student->image)) {
            Storage::delete($student->image);
        }
        $student->guardian()->delete();
        if ($student->delete()) {
            Toastr::success('Successfully student Deleted', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return back();
    }
}
