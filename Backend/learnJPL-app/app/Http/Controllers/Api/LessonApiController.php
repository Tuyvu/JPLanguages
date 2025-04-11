<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_lessons;
use App\Models\Heatmap_lessons;
use Carbon\Carbon;


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
        try {
            $lesson_user = User_lessons::where([
                ['user_id', '=', $request->user_id],
                ['lesson_id', '=', $request->lesson_id]
            ])->first();

            if ($lesson_user) {
                $lesson_user->update([
                    'watched_duration' => $request->time_watched,
                    'is_completed' => $request->is_completed?1:0,
                ]);
            } else {
                $lesson_user = User_lessons::create([
                    'user_id' => $request->user_id,
                    'lesson_id' => $request->lesson_id,
                    'watched_duration' => $request->time_watched,
                    'is_completed' => $request->is_completed?1:0,
                ]);
            }

       
            if ($request->is_completed == true) {
                $today = Carbon::today()->toDateString();

                $heatmap = Heatmap_lessons::where('user_id', $request->user_id)
                    ->whereDate('date', $today)
                    ->first();

                if ($heatmap) {
                    $heatmap->increment('votes');
                } else {
                    Heatmap_lessons::create([
                        'user_id' => $request->user_id,
                        'date' => $today,
                        'votes' => 1,
                    ]);
                }
            }

            return response()->json($lesson_user, 200);

        } catch (\Throwable $th) {
            dd($th);
            return response()->json(['message' => 'Error fetching lessons'], 500);
        }
    }
}
