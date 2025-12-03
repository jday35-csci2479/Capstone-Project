<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
   protected $fillable = ['user_id', 'forum_id', 'type'];

   public function forum()
   {
        return $this->belongsTo(Forums::class, 'forum_id');
   }

   public function user()
   {
        return $this->belongsTo(User::class);
   }
}
