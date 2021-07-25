<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("teacher.pages.exams.index", [
            "exams" => Exam::with(['course', 'examType'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("teacher.pages.exams.create");
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
            "exam_type_id" => "required|exists:exam_types,id",
            "course_id" => "required|exists:courses,id",
            "exam_date" => "required|date",
            "marks" => "required|numeric"
        ]);
        $data = [
            "exam_type_id" => $request->exam_type_id,
            "course_id" => $request->course_id,
            "marks" => $request->marks,
            "exam_date" => $request->exam_date
        ];
        $exam = new Exam($data);
        if ($exam->save()) {
            Toastr::success('Successfully Exam Added', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->route("officer.exams.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        $exam->loadMissing(['course', 'examType']);
        return view("teacher.pages.exams.edit", compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        $exam->loadMissing(['course', 'examType']);
        return view("teacher.pages.exams.edit", compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        $request->validate([
            "exam_type_id" => "required|exists:exam_types,id",
            "course_id" => "required|exists:courses,id",
            "exam_date" => "required|date",
            "marks" => "required|numeric"
        ]);
        $data = [
            "exam_type_id" => $request->exam_type_id,
            "course_id" => $request->course_id,
            "marks" => $request->marks,
            "exam_date" => $request->exam_date
        ];
        if ($exam->update($data)) {
            Toastr::success('Successfully Exam Updated', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        if ($exam->delete()) {
            Toastr::success('Successfully Exam Deleted', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return back();
    }
}
