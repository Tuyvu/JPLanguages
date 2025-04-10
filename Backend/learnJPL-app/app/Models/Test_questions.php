<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_questions extends Model
{
    use HasFactory;
    protected $fillable = ['question', 'test_id', 'option_a', 'option_b', 'option_c', 'option_d',  'correct_answer'];

    public function test()
    {
        return $this->belongsTo(Tests::class);
    }
   
}
