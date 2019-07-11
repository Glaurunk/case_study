<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateGrades;

class AjaxController extends Controller
{
    public function grades(UpdateGrades $request)
    {
        $grade = \DB::table('course_student')
            ->where('student_id', $request->student_id)
            ->where('course_id', $request->course_id)
            ->update(['grade' => $request->grade]);
          if ($grade)
            {
              return response()->json(['message' => 'success']);
            }
          else
            {
              return response()->json(['message' => 'error']);
            }
    }
}
