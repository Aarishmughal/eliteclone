<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchTopic extends Model
{
    protected $fillable = [
        'image',
        'title',
        'description',
        'grant_currency',
    ];
}
