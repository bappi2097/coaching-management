<?php

namespace App\Http\Controllers\Student;

use App\Models\CourseFee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CourseFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("student.pages.course-fees.index", [
            "courseFees" => CourseFee::with(["student", 'course'])->where("user_id", auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("student.pages.course-fees.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "course_id" => "required|exists:courses,id",
            "payment_date" => "required|date",
            "payment_amount" => "required|numeric",
            "transaction_id" => "required|string"
        ]);
        $data["user_id"] = auth()->user()->id;
        $courseFee = new CourseFee($data);
        if ($courseFee->save()) {
            Toastr::success('Successfully Course Fee Added', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->route("student.course-fees.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseFee  $courseFee
     * @return \Illuminate\Http\Response
     */
    public function show(CourseFee $courseFee)
    {
        $courseFee->loadMissing(['course', 'student']);
        return view("student.pages.course-fees.edit", compact('courseFee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseFee  $courseFee
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseFee $courseFee)
    {
        $courseFee->loadMissing(['course', 'student']);
        return view("student.pages.course-fees.edit", compact('courseFee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseFee  $courseFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseFee $courseFee)
    {
        $data = $request->validate([
            "course_id" => "required|exists:courses,id",
            "payment_date" => "required|date",
            "payment_amount" => "required|numeric",
            "transaction_id" => "required|string"
        ]);
        $data["user_id"] = auth()->user()->id;
        if ($courseFee->update($data)) {
            Toastr::success('Successfully Course Fee Update', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseFee  $courseFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseFee $courseFee)
    {
        if ($courseFee->delete()) {
            Toastr::success('Successfully Course Fee Deleted', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return back();
    }
}