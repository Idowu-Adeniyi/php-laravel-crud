<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('courses.index',[
            'courses' => Course::all()
        ]);
    }


    public function trashed()
    {
        $courses = Course::onlyTrashed() -> get();
        return view('courses.trashed',[
            'courses' => $courses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        Course::create($request->validated());
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course -> update($request->validated());
        return redirect() -> route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Course::destroy($id);
        return redirect() -> route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course = Course::withTrashed() -> where('id', $id) -> first();
        $course -> forceDelete();
        return redirect() -> route('courses.trashed');
    }
    public function restore($id){
        $course = Course::withTrashed() -> where('id', $id) -> first();
        $course ->restore();
        return redirect() -> route('courses.index');
    }
}
