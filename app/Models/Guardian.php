<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guardian extends Authenticatable
{
    use HasFactory, HasRoles;

    /**
     * The attribute for multi guard auth.
     *
     * @var string
     */
    protected $guard = 'guardian';

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
