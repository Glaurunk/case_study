@extends('layouts.app')

@section('title', 'Courses')

@section('content')
  <div class="card">
    <div class="card-header"><h3>Courses Index</h3></div>
      <div class="card-body">

        @if (count($courses) > 0)

        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Teacher</th>
              <th scope="col">Students</th>
              <th scope="col">Date</th>
              <th scope="col">Hours</th>
              <th scope="col">Actions</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>

            @foreach ($courses as $course)
              <tr>
                <th scope="row"><a href="{{ route('courses.show', $course->id) }}">{{ $course->title}}</a></th>
                <td>
                  @if (!empty($course->teacher_id))
                    <a href="/teachers/{{ $course->teacher_id }}">{{ $course->teacher->name }}</a>
                  @else
                    <p class="text-danger">TEACHER MISSING!</p>
                  @endif
                </td>
                <td class="text-center">{{ count($course->students) }}</td>
                <td>{{ $course->dateFormated() }}</td>
                <td>starts at: {{ $course->start_timeFormated() }}<br>
                  ends at: {{ $course->end_timeFormated() }}
                </td>
                <td><a href="{{ route('courses.edit', $course->id) }}"class="btn btn-sm btn-outline-info">Update</a></td>
                <td>
                  <form class="" action="{{ route('courses.destroy', $course->id) }}" method="post">
                    @csrf
                    @method('Delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button></td>
                  </form>
              </tr>
            @endforeach
          </tbody>
        </table>

        {{ $courses->links() }}

      @else
        <h4>No courses found in the database.</h4>
      @endif

      <hr>
      <div class="row justify-content-center">
        <a href="{{ route('courses.create') }}" class="btn btn-outline-success">Add a course</a>
      </div> <!-- here ends row -->
    </div> <!-- here ends card-body -->
  </div> <!-- here ends card -->
@endsection
