<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'image',
        'title',
        'website',
        'card',
        'start_date',
        'end_date',
        'description',
        'reference_number',
        'grant_amount',
        'grant_currency',
    ];
}
