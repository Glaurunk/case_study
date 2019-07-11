@extends('layouts.app')

@section('title', 'Courses')

@section('content')
  <div class="card">
    <div class="card-header"><h3>Course Card # {{ $course->id }}</h3></div>
      <div class="card-body">
        <h5>Title: {{ $course->title }}</h5>
        <h5>Teacher: <a href="{{ route('teachers.show', $course->teacher->id) }}">{{ $course->teacher->name }}</a></h5>
        <h5>Time Schedule: {{ $course->dateFormated() }},from {{ $course->start_timeFormated() }} to {{ $course->end_timeFormated() }}</h5>
        <hr>

      @if (count($course->students) > 0)
        <h5>The following students have enrolled for this course</h5>
        <table class="table">
          <thead class="">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Grade</th>
              <th scope="col">Actions</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>

            @foreach ($course->students as $student)
              <tr>
                <th scope="row"><a href="{{ route('students.show', $student->id) }}">{{ $student->name}}</a></th>
                <td>{{ $student->grade }}</td>
                <td><a href="{{ route('students.edit', $student->id) }}"class="btn btn-sm btn-outline-dark">Pass Grade</a></td>
                <td>
              </tr>
            @endforeach
          </tbody>
        </table>

      @else
        <h4 class="text-danger">No students enrolled for this course</h4>
      @endif

      <div class="row mt-5">
        <div class="col-2">
          <a href="{{ route('courses.edit', $course->id) }}"class="btn btn-info">Update Course Info</a>
        </div>
      </form>
        <div class="col-2">
          <form class="" action="{{ route('courses.destroy', $course->id) }}" method="post">
            @csrf
            @method('Delete')
            <button type="submit" class="btn btn-danger">Delete Course</button></td>
          </form>
        </div> <!-- here ends col -->
      </div> <!-- here ends row -->

    </div> <!-- Here ends card-body -->
  </div> <!-- Here ends card -->
@endsection
