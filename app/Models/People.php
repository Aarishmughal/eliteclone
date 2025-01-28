<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'username',
        'email',
        'gender',
        'phone',
        'bio',
        'image'
    ];
}
