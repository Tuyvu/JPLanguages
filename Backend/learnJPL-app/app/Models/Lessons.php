<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Lessons extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title','course_id', 'content', 'video_url', 'order'];

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }
    public function conversations() {
        return $this->hasMany(Conversation::class, 'lesson_id');
    }
    
    public function vocabularies() {
        return $this->hasMany(Vocabularies::class, 'lesson_id');
    }
    
    public function sentencePatterns() {
        return $this->hasMany(Sentence_p::class, 'lesson_id');
    }
    
    public function kanjis() {
        return $this->hasMany(kanjis::class, 'lesson_id');
    }
   
}
