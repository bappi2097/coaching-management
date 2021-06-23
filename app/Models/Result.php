<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'exam_id',
        'marks'
    ];

    /**
     * one to many relation with user
     * 
     * @param \App\Models\User
     */
    public function user()
    {
        return $this->belongsTo(User::class, "user_id", 'id');
    }
}
