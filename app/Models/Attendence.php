<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function course()
    {
        return $this->belongsTo(Course::class, "course_id", "id");
    }
    public function student()
    {
        return $this->belongsTo(User::class, "student_id", "id")->role('student');
    }
    public function teacher()
    {
        return $this->belongsTo(User::class, "teacher_id", "id")->role('teacher');
    }
}
