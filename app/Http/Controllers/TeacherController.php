<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Http\Requests\StoreTeacher;
use App\Http\Requests\UpdateTeacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $teachers = Teacher::orderby('name', 'asc')->paginate(10);
         return view('teachers.index')->with('teachers', $teachers);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacher $request)
    {
      if ($request->age < 18)
        {
          return back()->with('error', 'The teacher cannot be underage!');
        }
      if  ($request->age > 65)
        {
          return back()->with('error', 'The teacher should be retired!');
        }

        $teacher = new Teacher;
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->age = $request->age;
        $teacher->save();

        return redirect('/teachers')->withInput()->with('success', 'The teacher has been added to the registry.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
      return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacher $request, Teacher $teacher)
    {
      if ($request->age < 18)
        {
          return back()->with('error', 'The teacher cannot be underage!');
        }
      if  ($request->age > 65)
        {
          return back()->with('error', 'The teacher should be retired!');
        }

        $teacher->name = $request->name;
        $teacher->age = $request->age;
        $teacher->save();

        return redirect('/teachers')->withInput()->with('success', "The teacher's record has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Teacher $teacher)
     {
         $teacher->delete();
         return redirect('/teachers')->with('success', 'The teacher has been removed from the registry');
     }
}
