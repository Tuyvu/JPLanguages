<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;



class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Courses::paginate(10);
        return view('admin.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courses.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fileName = $request->photo->getClientOriginalName();
        $request->photo->storeAs('images', $fileName, 'public');
        $request->merge(['image'=> $fileName]);
        // dd($request->all());
        try {
            $courses = Courses::create($request->all());
        return redirect()->route('courses.index');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $courses = Courses::find($id);
        // dd($courses);
        return view('admin.courses.edit',compact('courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $courses = Courses::find($id);
        // dd($request->all());
        if ($request->hasFile('photo')) {
            $fileName = $request->photo->getClientOriginalName();
            $request->photo->storeAs('images', $fileName, 'public');
            $request->merge(['image' => $fileName]);
        }
        try {
            $courses->update($request->all());
            return redirect()->route('courses.index')->with('success', 'Cập nhật thành công');
        } catch (\Throwable $th) {
            dd($th);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $courses = Courses::find($id);
        try {
            $courses->delete();
            return redirect()->route('courses.index')->with('success', 'Xóa khóa hoc thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Xóa khóa học thất bại');
        }
    }
    public function restore()
    {
        $courses = Courses::onlyTrashed()->paginate(10);
        // dd($courses->title);
        return view('admin.courses.restore',compact('courses'));
    }
    public function restore_id($id)
    {
        Courses::withTrashed()->where('id',$id)->restore();
        return redirect()->route('courses.index')->with('error','khôi phục thành công');
       
    }
    public function foredelete($id)
    {
        Courses::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->route('courses.restore')->with('error','xóa thành công');
       
    }
}
