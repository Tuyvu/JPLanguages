<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Heatmap_lessons extends Model
{
    protected $fillable = ['user_id', 'action', 'date', 'votes'];

    public function users()
    {
        return $this->belongsTo(Users::class);
    }

}
