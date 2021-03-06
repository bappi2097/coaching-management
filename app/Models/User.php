<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'image',
        'status',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * this method return user full name
     *
     * @return string
     */
    public function fullName(): string
    {
        return $this->first_name . " " . $this->last_name;
    }

    /**
     * this method return user image if exists
     * unless return dummy image
     *
     * @return string
     */
    public function image(): string
    {
        return !empty($this->image) && Storage::exists($this->image) ? $this->image : "dashboard/img/theme/team-1.jpg";
    }

    /**
     * relation with guardian
     *
     * @return \App\Models\Guardian
     */
    public function guardian()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * many to many relation with course
     * 
     * @return \App\Models\Course.
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, "course_user")->withPivot(['status'])->withTimestamps();
    }

    /**
     * one to many relation with Result
     * 
     * @param \App\Models\Result
     */
    public function results()
    {
        return $this->hasMany(Result::class, "exam_id", 'id');
    }


    /**
     * one to many relation with Result
     * 
     * @param \App\Models\CourseFee
     */
    public function courseFees()
    {
        return $this->hasMany(CourseFee::class, "user_id", 'id');
    }

    public function assignCourses()
    {
        return $this->belongsToMany(Course::class, 'course_teacher', "teacher_id", "course_id")->withTimestamps();
    }
    public function teacherAttendences()
    {
        return $this->hasMany(Attendence::class, "teacher_id", "id");
    }
    public function studentAttendences()
    {
        return $this->hasMany(Attendence::class, "student_id", "id");
    }
}
