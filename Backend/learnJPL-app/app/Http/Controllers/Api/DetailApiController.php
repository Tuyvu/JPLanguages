<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Conversation;
use App\Models\Vocabularies;
use App\Models\Test;

class DetailApiController extends Controller
{
    public function GetVocabularies()
    {
        $vocabularies = Vocabularies::limit(100)->get();
        return response()->json($vocabularies, 200);
    }
    public function GetTest()
    {
        $test = Test::where('id'==1)->first();
        return response()->json($test, 200);
    }

}
