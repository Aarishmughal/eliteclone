<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMediaLink extends Model
{
    protected $fillable = [
        'user_id',
        'platform_name',
        'account_link',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
