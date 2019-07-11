<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Http\Requests\StoreCourse;
use App\Http\Requests\UpdateCourse;
use App\Teacher;
use App\Student;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $courses = Course::orderby('title', 'asc')->paginate(10);
      return view('courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        $students = Student::all();
        return view('courses.create')->with('teachers', $teachers)->with('students', $students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourse $request)
    {
      $course = new Course;
      $course->title = $request->title;
      $course->teacher_id = $request->teacher_id;
      $course->date = $request->date;
      $course->start_time = $request->start;
      $course->end_time = $request->end;
      //  dd($course);
      $course->save();

      return redirect('/courses')->withInput()->with('success', 'The course has been added to the registry.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $teachers = Teacher::all();
        $students = Student::all();
        return view('courses.edit')->with('course', $course)->with('teachers', $teachers)->with('students', $students);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Course $course, UpdateCourse $request)
    {
      $course->title = $request->title;
      $course->teacher_id = $request->teacher_id;
      $course->date = $request->date;
      $course->start_time = $request->start;
      $course->end_time = $request->end;
      $course->save();

      return redirect('/courses')->withInput()->with('success', "The course's information have been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
      $course->delete();
      return redirect('/courses')->with('success', 'The course has been removed from the registry');
    }
}
