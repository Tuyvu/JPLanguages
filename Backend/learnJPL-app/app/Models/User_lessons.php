<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_lessons extends Model
{
    protected $fillable = ['user_id', 'lesson_id', 'watched_duration', 'is_completed', 'last_watched_at'];

    public function users()
    {
        return $this->belongsTo(Users::class);
    }

    public function lessons()
    {
        return $this->belongsTo(Lessons::class);
    }
}
