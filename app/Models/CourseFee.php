<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseFee extends Model
{
    use HasFactory;
    protected $guarded = [];
    /**
     * one to many relation with course
     * 
     * @param \App\Models\Course
     */
    public function course()
    {
        return $this->belongsTo(Course::class, "course_id", 'id');
    }

    /**
     * one to many relation with user
     * 
     * @param \App\Models\User
     */
    public function student()
    {
        return $this->belongsTo(User::class, "user_id", 'id');
    }
}
