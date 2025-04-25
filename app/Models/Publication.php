<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = [
        'title',
        'type',
        'year',
        'doi',
        'iris',
    ];

    public function authors()
    {
        return $this->hasMany(Author::class);
    }

    public function journal()
    {
        return $this->hasOne(Journal::class);
    }
}
