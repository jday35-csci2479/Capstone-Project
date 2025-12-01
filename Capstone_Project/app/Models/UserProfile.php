<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';
    
    protected $fillable = [
        'user_id',
        'birthday',
        'city',
        'profile_picture',
        'about_me',
        'hobbies',
        'majors',
        'contact_information',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}