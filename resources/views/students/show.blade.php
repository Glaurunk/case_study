@extends('layouts.app')

@section('title', 'Students')

@section('content')
  <div class="card">
    <div class="card-header"><h3>Student Card # {{ $student->id }}</h3></div>
    <div class="card-body">
      <h5>Student Name: {{ $student->name }}</h5>
      <h5>Student Email: {{ $student->email }}</h5>
      <h5>Student Age: {{ $student->age }}</h5>
      <hr>
      @if (count($student->courses) > 0)
        <h5>{{ $student->name }} attends the following courses</h5>
        <table class="table">
          <thead class="">
            <tr>
              <th scope="col">Course</th>
              <th scope="col">Grade</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($student->courses as $course)
              <tr>
                <th scope="row"><a href="{{ route('courses.show', $course->id) }}">{{ $course->title}}</a></th>
                <td>
                  @php
                    $grade = $course->students->find($student->id)->pivot->grade
                  @endphp

                  @if ($grade == 1)
                    <span class="text-danger">FAIL</span>
                  @elseif ($grade == 2)
                    <span class="text-success">PASS</span>
                  @elseif ($grade == 3)
                    <span class="text-success">GOOD</span>
                  @elseif ($grade == 4)
                    <span class="text-success">VERY GOOD</span>
                  @elseif ($grade == 5)
                    <span class="text-success">EXCELLENT</span>
                  @else
                    <span class="text-info">UNASSIGNED</span>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        {{-- {{ $course->students->links() }} --}}

      @else
        <h4 class="text-danger">This student has no courses selected</h4>
      @endif

      <div class="row mt-5">
        <div class="col-2">
          <a href="{{ route('students.edit', $student->id) }}"class="btn btn-info">Update Student Info</a>
        </div>
      </form>
        <div class="col-2">
          <form class="" action="{{ route('students.destroy', $student->id) }}" method="post">
            @csrf
            @method('Delete')
            <button type="submit" class="btn btn-danger">Delete Student</button></td>
          </form>
        </div> <!-- here ends col -->
      </div> <!-- here ends row -->


    </div> <!-- Here ends card-body -->
  </div> <!-- Here ends card -->
@endsection
