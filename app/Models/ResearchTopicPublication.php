<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchTopicPublication extends Model
{
    protected $fillable = [
        'research_topic_id',
        'publication_id',
    ];
}
