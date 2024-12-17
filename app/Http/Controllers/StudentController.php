<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use App\Models\Course;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.index', [
            'students' => Student::all()
        ]);
    }

    public function trashed()
    {
        $students = Student::onlyTrashed()->get();
        return view('students.trashed', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->validated());
        $student->courses()->attach($request->courses);
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $courses = Course::all();
        return view('students.edit', compact('student', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());
        $student->courses()->sync($request->courses);
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Student::destroy($id);
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::withTrashed()->where('id', $id)->first();
        $student->forceDelete();
        return redirect()->route('students.trashed');
    }

    public function restore($id)
    {
        $student = Student::withTrashed()->where('id', $id)->first();
        $student->restore();
        return redirect()->route('students.index');
    }
}
