<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory, HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'course_fee',
        'is_active'
    ];

    /**
     * Get the options for generating the slug.
     * 
     * @return \Spatie\Sluggable\SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * many to many relation with user
     * 
     * @return \App\Models\User.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, "course_user")->withPivot(['status']);
    }

    /**
     * one to many relation with exam
     * 
     * @param \App\Models\Course
     */
    public function exams()
    {
        return $this->hasMany(Exam::class, "course_id", 'id');
    }
}
