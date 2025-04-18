<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Courses extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title', 'description', 'level', 'image'];

    public function lessons()
    {
        return $this->hasMany(Lessons::class, 'course_id');
    }
    public function course()
{
    return $this->belongsTo(Courses::class, 'course_id');
}

}

