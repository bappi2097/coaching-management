<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'password'
    ];

    /**
     * relation with user
     *
     * @return \App\Model\User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->role('guardian');
    }
}
