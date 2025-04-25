<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'publication_id',
        'first_name',
        'middle_name',
        'last_name',
    ];
}
