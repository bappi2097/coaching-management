<?php

namespace App\Http\Controllers\Student;

use App\Models\ExamType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class ExamTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("student.pages.exam-types.index", [
            "examTypes" => ExamType::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("student.pages.exam-types.create");
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
            "name" => "required|string|max:255"
        ]);
        $data = [
            "name" => $request->name
        ];
        $examType = new ExamType($data);
        if ($examType->save()) {
            Toastr::success('Successfully Exam Type Added', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->route("officer.exam-types.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamType  $examType
     * @return \Illuminate\Http\Response
     */
    public function show(ExamType $examType)
    {
        return view("student.pages.exam-types.edit", compact('examType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamType  $examType
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamType $examType)
    {
        return view("student.pages.exam-types.edit", compact('examType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamType  $examType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamType $examType)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "slug" => "required|string|max:255|unique:exam_types,slug," . $examType->id,
        ]);
        $data = [
            "name" => $request->name,
            "slug" => $request->slug
        ];
        if ($examType->update($data)) {
            Toastr::success('Successfully Exam Type Updated', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamType  $examType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamType $examType)
    {
        if ($examType->delete()) {
            Toastr::success('Successfully Exam Type Deleted', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return back();
    }
}
