<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exam_type_id',
        'course_id',
        'exam_date',
        'marks',
    ];

    /**
     * one to many relation with Exam Type
     * 
     * @param \App\Models\ExamType
     */
    public function examType()
    {
        return $this->belongsTo(ExamType::class, "exam_type_id", 'id');
    }

    /**
     * one to many relation with course
     * 
     * @param \App\Models\Course
     */
    public function course()
    {
        return $this->belongsTo(Course::class, "course_id", 'id');
    }
}
