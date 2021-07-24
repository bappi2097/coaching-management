<?php

namespace App\Http\Controllers\Officer;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.pages.courses.index", [
            "courses" => Course::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.courses.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "required|string",
            "course_fee" => "required|numeric",
            "image" => "nullable|file",
            "is_active" => "required"
        ]);
        $data = [
            "title" => $request->title,
            "description" => $request->description,
            "course_fee" => $request->course_fee,
            "is_acrive" => $request->is_active == "on" ? true : false
        ];
        if ($request->hasFile('image')) {
            $data['image'] = Storage::put("/images/courses", $request->image);
        }
        $course = new Course($data);
        if ($course->save()) {
            Toastr::success('Successfully Course Added', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->route("officer.courses.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view("admin.pages.courses.show", compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view("admin.pages.courses.edit", compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "required|string",
            "course_fee" => "required|numeric",
            "image" => "nullable|file",
            "is_active" => "required"
        ]);
        $data = [
            "title" => $request->title,
            "description" => $request->description,
            "course_fee" => $request->course_fee,
            "is_acrive" => $request->is_active == "on" ? true : false
        ];
        if ($request->hasFile('image')) {
            if (Storage::exists($course->image)) {
                Storage::delete($course->image);
            }
            $data['image'] = Storage::put("/images/courses", $request->image);
        }
        if ($course->update($data)) {
            Toastr::success('Successfully Course Updated', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        if (Storage::exists($course->image)) {
            Storage::delete($course->image);
        }
        if ($course->delete()) {
            Toastr::success('Successfully Course Deleted', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return back();
    }
}
