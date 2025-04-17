<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Conversation;
use App\Models\Vocabulary;
use App\Models\Pattern;
use App\Models\Kanji;
use App\Models\Lessons;


class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lessons::paginate(10);
        return view('admin.lessons.index',compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Courses::all();
        return view('admin.lessons.add',compact('courses'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        try {
            // Tạo bài học chính
            $lesson = Lessons::create([
                'title' => $request->title,
                'course_id' => $request->course_id,
                'video_url' => $request->video_url,
                'content' => $request->content,
            ]);

            // Hội thoại
            if ($request->has('conversations')) {
                foreach ($request->conversations as $item) {
                    if (!empty($item['speaker']) || !empty($item['content'])) {
                        $lesson->conversations()->create([
                            'speaker' => $item['speaker'],
                            'content' => $item['content'],
                        ]);
                    }
                }
            }

            // Từ vựng
            if ($request->has('vocabularies')) {
                foreach ($request->vocabularies as $item) {
                    if (!empty($item['word'])) {
                        $lesson->vocabularies()->create([
                            'word' => $item['word'],
                            'meaning' => $item['meaning'],
                            'pronunciation' => $item['pronunciation'],
                            'example_sentence' => $item['example_sentence'],
                        ]);
                    }
                }
            }

            // Mẫu câu
            if ($request->has('patterns')) {
                foreach ($request->patterns as $item) {
                    if (!empty($item['pattern'])) {
                        $lesson->sentencePatterns()->create([
                            'pattern' => $item['pattern'],
                            'usage' => $item['usage'],
                            'example' => $item['example'],
                        ]);
                    }
                }
            }

            // Chữ Hán
            if ($request->has('kanjis')) {
                foreach ($request->kanjis as $item) {
                    if (!empty($item['character'])) {
                        $lesson->kanjis()->create([
                            'character' => $item['character'],
                            'meaning' => $item['meaning'],
                            'onyomi' => $item['onyomi'],
                            'kunyomi' => $item['kunyomi'],
                            'strokes' => $item['strokes'],
                            'example' => $item['example'],
                        ]);
                    }
                }
            }

            return redirect()->route('lessons.index')->with('success', 'Tạo bài học thành công!');
        } catch (\Exception $e) {
            dd($e);
            return back()->withInput()->with('error', 'Lỗi: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $courses = Courses::all();
        $lessons = Lessons::find($id);
        // dd($courses);
        return view('admin.lessons.edit',compact('lessons', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $lessons = Lessons::find($id);
        try {
            $lessons->update($request->all());
            return redirect()->route('lessons.index')->with('success', 'Cập nhật thành công');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $lessons = Lessons::find($id);
        try {
            $lessons->delete();
            return redirect()->route('lessons.index')->with('success', 'Xóa bài học thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Xóa bài học thất bại');
        }
    }
    public function restore()
    {
        $lessons = lessons::onlyTrashed()->paginate(10);
        // dd($lessons->title);
        return view('admin.lessons.restore',compact('lessons'));
    }
    public function restore_id($id)
    {
        Lessons::withTrashed()->where('id',$id)->restore();
        return redirect()->route('lessons.index')->with('error','khôi phục thành công');
       
    }
    public function foredelete($id)
    {
        Lessons::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->route('lessons.restore')->with('error','xóa thành công');
       
    }
}
