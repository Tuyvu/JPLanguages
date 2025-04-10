<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tests;
use App\Models\Courses;
use App\Models\Test_questions;


class TestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tests = Tests::paginate(10);
        return view('admin.tests.index',compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Courses::all();
        return view('admin.tests.add',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $test = Tests::create([
                'course_id'=>$request->course_id,
                'description'=>$request->description,
                'time_limit'=>$request->time_limit,
                'total_questions'=>$request->total_questions,
                'title'=>$request->title
            ]);
            $test_id = $test->id;
            for ($i = 0; $i < count($request->question); $i++) {
                $tests_question = new Test_questions();
                $tests_question->test_id  = $test_id;
                $tests_question->question = $request->question[$i];
                $tests_question->option_a = $request->option_a[$i];
                $tests_question->option_b = $request->option_b[$i];
                $tests_question->option_c = $request->option_c[$i];
                $tests_question->option_d = $request->option_d[$i];
                $tests_question->correct_answer = $request->correct_answer[$i];
                $tests_question->save();
            }
            return redirect()->route('tests.index');
        } catch (\Throwable $th) {
            dd($th);
        }

    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $courses = Courses::all();
        $tests = Tests::find($id);
        // dd($courses);
        return view('admin.tests.edit',compact('tests', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        // dd($request->all());
        $tests = Tests::find($id);
        try {
            $tests->update([
                'course_id'=>$request->course_id,
                'description'=>$request->description,
                'time_limit'=>$request->time_limit,
                'total_questions'=>$request->total_questions,
                'title'=>$request->title
            ]);
            $test_id = $tests->id;
            Test_questions::where('test_id',$test_id)->delete();
            for ($i = 0; $i < count($request->question); $i++) {
                $tests_question = new Test_questions();
                $tests_question->test_id  = $test_id;
                $tests_question->question = $request->question[$i];
                $tests_question->option_a = $request->option_a[$i];
                $tests_question->option_b = $request->option_b[$i];
                $tests_question->option_c = $request->option_c[$i];
                $tests_question->option_d = $request->option_d[$i];
                $tests_question->correct_answer = $request->correct_answer[$i];
                $tests_question->save();
            }
            return redirect()->route('tests.index')->with('success', 'Cập nhật thành công');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $tests = Tests::find($id);
        try {
            $tests->delete();
            return redirect()->route('tests.index')->with('success', 'Xóa bài học thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Xóa bài học thất bại');
        }
    }
    public function restore()
    {
        $tests = Tests::onlyTrashed()->paginate(10);
        // dd($lessons->title);
        return view('admin.tests.restore',compact('tests'));
    }
    public function restore_id($id)
    {
        Tests::withTrashed()->where('id',$id)->restore();
        return redirect()->route('tests.index')->with('error','khôi phục thành công');
       
    }
    public function foredelete($id)
    {
        Tests::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->route('tests.restore')->with('error','xóa thành công');
       
    }
}
