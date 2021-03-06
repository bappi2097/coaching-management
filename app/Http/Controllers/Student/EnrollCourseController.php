<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class EnrollCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("student.pages.enroll-courses.index", [
            "students" => User::role('student')->with('courses')->get()->filter(function ($user) {
                return $user->courses()->exists();
            }),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("student.pages.enroll-courses.create");
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
            "user_id" => "required|exists:users,id",
            "course_id.*" => "required|exists:courses,id",
        ]);
        $user_courses = User::find($request->user_id)->courses();
        $user_courses->attach($request->course_id);
        if ($user_courses->whereIn('course_id', $request->course_id)->exists()) {
            Toastr::success('Successfully Enrolled', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->route("officer.enroll-courses.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $student
     * @return \Illuminate\Http\Response
     */
    public function show(User $student)
    {
        $student->loadMissing('courses');
        return view("student.pages.enroll-courses.edit", compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(User $student)
    {
        $student->loadMissing('courses');
        return view("student.pages.enroll-courses.edit", compact('student'));
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
            "user_id" => "required|exists:users,id",
            "course_id.*" => "required|exists:courses,id",
        ]);
        $user_courses = User::find($request->user_id)->courses();
        $user_courses->sync($request->course_id);
        if ($user_courses->whereIn('course_id', $request->course_id)->exists()) {
            Toastr::success('Successfully Enrolled Update', "Success");
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
        if ($student->delete()) {
            Toastr::success('Successfully Enroll Course Deleted', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return back();
    }
}
