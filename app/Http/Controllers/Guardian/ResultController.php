<?php

namespace App\Http\Controllers\Guardian;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("guardian.pages.results.index", [
            "results" => Result::with(['student', 'exam', 'exam.examType'])->where("user_id", auth()->user()->user_id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("guardian.pages.results.create");
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
            "exam_id" => "required|exists:exams,id",
            "marks" => "required|numeric"
        ]);
        $data = [
            "user_id" => $request->user_id,
            "exam_id" => $request->exam_id,
            "marks" => $request->marks
        ];
        $result = new Result($data);
        if ($result->save()) {
            Toastr::success('Successfully Result Added', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->route("officer.results.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        $result->loadMissing(['student', 'exam', 'exam.examType']);
        return view("guardian.pages.results.edit", compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        $result->loadMissing(['student', 'exam', 'exam.examType']);
        return view("guardian.pages.results.edit", compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        $request->validate([
            "user_id" => "required|exists:users,id",
            "exam_id" => "required|exists:exams,id",
            "marks" => "required|numeric"
        ]);
        $data = [
            "user_id" => $request->user_id,
            "exam_id" => $request->exam_id,
            "marks" => $request->marks
        ];
        if ($result->update($data)) {
            Toastr::success('Successfully Result Updated', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        if ($result->delete()) {
            Toastr::success('Successfully Result Deleted', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return back();
    }
}
