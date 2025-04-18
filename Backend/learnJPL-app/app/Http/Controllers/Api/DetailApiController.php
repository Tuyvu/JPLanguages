<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Conversation;
use App\Models\Vocabularies;

class DetailApiController extends Controller
{
    public function GetVocabularies()
    {
        $vocabularies = Vocabularies::limit(100)->get();
        return response()->json($vocabularies, 200);
    }

}
