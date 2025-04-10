<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Lessons;
use App\Models\User_courses;


class CoursesApiController extends Controller
{
    public function index()
    {
        return response()->json(Courses::paginate(10), 200);
    }
    public function CoursesID(int $id)
    {
        // dd($id);
        $lesson_courses = Lessons::where('course_id',$id)?->paginate(10);
    // dd($lesson_courses);
        if($lesson_courses){
            return response()->json($lesson_courses, 200);
        }else{
            return response()->json(['message'=>'Course not found'], 404);
        }
    }
    public function Bookcourses(Request $request)
    {
        // dd($request->all());
        $usercourses = User_courses::where([
            ['user_id', '=', $request->userId],
            ['course_id', '=', $request->courseId]
        ])->first();
        // dd($usercourses);
        if($usercourses){
            // dd("có khóa học này rồi");

            return response()->json(['message' => 'Bạn đã đăng ký khóa học này rồi!'], 401);
        }else{
            // dd("chưa có khóa học này");
            try {
                User_courses::create([
                    'user_id' =>$request->userId,
                    'course_id' => $request->courseId
                ]);
                return response()->json(['message' => 'Bắt đầu khóa học thành công!']);
            } catch (\Throwable $th) {
                dd($th);
            }
        }
        
    }
    public function GetAllCoursesUser(int $id)
    {
        $user_courses = User_courses::where('user_id', $id)->get();
        $courses = [];
        foreach ($user_courses as $key => $value) {
            $courses[] = Courses::find($value->course_id);
        }
        return response()->json($courses, 200);
    }


}
