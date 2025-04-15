<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_courses extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'course_id','The_last_Courses', 'progress','status','enrolled_at','completed_at'];

    public function users()
    {
        return $this->belongsTo(Users::class);
    }
    public function course()
    {
        return $this->belongsTo(Courses::class);
    }
}
