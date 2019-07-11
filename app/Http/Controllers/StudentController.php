<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Http\Requests\StoreStudent;
use App\Http\Requests\UpdateStudent;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderby('name', 'asc')->paginate(10);
        return view('students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudent $request)
    {

       if ($request->age < 18)
         {
           return back()->with('error', 'The student is underage!');
         }

       $student = new Student;
       $student->name = $request->name;
       $student->email = $request->email;
       $student->age = $request->age;
       $student->save();

       if ($student->age > 39)
       {
         return redirect('/students')->withInput()->with('success', 'Never too old to learn something new! The student has been added to the registry.');
       } else {
         return redirect('/students')->withInput()->with('success', 'The student has been added to the registry.');
       }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudent $request, Student $student)
    {
      if ($request->age < 18)
        {
          return back()->with('error', 'The student can not be underage!');
        }

        $student->name = $request->name;
        $student->age = $request->age;
        $student->save();

        return redirect('/students')->withInput()->with('success', "The student's record has been updated.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('/students')->with('success', 'The student has been removed from the registry');
    }
}
