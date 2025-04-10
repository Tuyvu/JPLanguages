<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tests extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['description', 'course_id', 'time_limit', 'total_questions', 'title'];

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }
    public function test_questions()
{
    return $this->hasMany(Test_questions::class, 'test_id');
}
    
}
