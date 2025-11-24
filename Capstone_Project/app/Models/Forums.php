<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forums extends Model
{
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'category',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class, 'forum_id');
    }
}
