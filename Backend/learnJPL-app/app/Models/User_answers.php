<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_answers extends Model
{
    use HasFactory;
    protected $fillable = ['user_test_id','test_question_id','correct_answer'];

    public function test_questions()
    {
        return $this->belongsTo(Test_questions::class);
    }
    public function user_tests()
    {
        return $this->belongsTo(User_tests::class);
    }
}
