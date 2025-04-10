<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_tests extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'test_id' ,'score','total_score','status','attempted_at'];

    public function users()
    {
        return $this->belongsTo(Users::class);
    }
    public function tests()
    {
        return $this->belongsTo(Tests::class);
    }
}
