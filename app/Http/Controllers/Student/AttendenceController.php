<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Attendence;
use App\Models\Course;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->course_id) {
            return view("student.pages.attendences.index", [
                "course" => Course::with(['users'])->find(request()->course_id),
                "data" => request()->all(),
                "attedence_ids" => Attendence::where(
                    ["course_id" => request()->course_id, "teacher_id" => auth()->user()->id, "attendence_date" => request()->attendence_date, "is_present" => true]
                )->pluck('student_id')->all(),
            ]);
        }
        return view("student.pages.attendences.index");
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
            "course_id" => "required|exists:courses,id",
            "attendence_date" => 'required|date',
            "present" => "nullable|array"
        ]);
        $course = Course::with(['users'])->find($request->course_id);
        $teacher = auth()->user();
        foreach ($course->users as $student) {
            Attendence::updateOrCreate(
                [
                    "course_id" => $request->course_id,
                    "attendence_date" => $request->attendence_date,
                    "student_id" => $student->id,
                    "teacher_id" => $teacher->id
                ],
                [
                    "is_present" => false
                ]
            );
        }
        foreach ($request->present as $student_id => $present) {
            Attendence::updateOrCreate(
                [
                    "course_id" => $request->course_id,
                    "attendence_date" => $request->attendence_date,
                    "student_id" => $student_id,
                    "teacher_id" => $teacher->id
                ],
                [
                    "is_present" => true
                ]
            );
        }
        return back()->with([
            "course" => $course,
            "attedence_ids" => Attendence::where(["course_id" => $request->course_id, "teacher_id" => $teacher->id, "attendence_date" => $request->attendence_date])->pluck('student_id')->all(),
            "data" => request()->all()
        ]);
    }
}
