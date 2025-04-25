<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $fillable = [
        'publication_id',
        'name',
        'edition',
        'volume',
        'page_number',
    ];

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}
