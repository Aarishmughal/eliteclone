<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'project_id',
        'name',
        'website',
        'country',
        'country_code',
        'type',
        'is_associated'
    ];
}
