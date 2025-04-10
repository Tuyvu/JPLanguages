<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_lessons;


class LessonApiController extends Controller
{
    public function lessocnID(int $id)
    {
        // dd($id);
        $lesson_courses = Lessons::where('lesson_id',$id)?->first();
    // dd($lesson_courses);
        if($lesson_courses){
            return response()->json($lesson_courses, 200);
        }else{
            return response()->json(['message'=>'lesson not found'], 404);
        }
    }
    public function lessonUser(Request $request)
    {
        $lesson_user = User_lessons::where([
            ['user_id', '=', $request->user_id],
            ['lesson_id', '=', $request->lesson_id]
        ])->first();
        try{
            if($lesson_user && $request->is_completed == true){
            $lesson_user = User_lessons::update([
                'watched_duration'=>$request->time_watched,
            ]);
            return response()->json($lesson_user, 200);
        }elseif($lesson_user && $request->is_completed == false){
            $lesson_user = User_lessons::update([
                'watched_duration'=>$request->time_watched,
                'is_completed'=>$request->is_completed,
            ]);
            return response()->json($lesson_user, 200);
        }else{ 
                $lesson_user = User_lessons::create([
                    'user_id'=>$request->user_id,
                    'lesson_id'=>$request->lesson_id,
                    'watched_duration'=>$request->time_watched,
                    'is_completed'=>$request->is_completed,
                ]);
                    return response()->json($lesson_user, 200);
            }  
        }catch (\Throwable $th) {
                return response()->json(['message' => 'Error fetching lessons'], 500);
        }
    }
}
