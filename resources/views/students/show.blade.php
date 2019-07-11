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
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($student->courses as $course)
              <tr>
                <th scope="row"><a href="{{ route('courses.show', $course->id) }}">{{ $course->title}}</a></th>
                <td>{{ $course->grade }}</td>
                <td><a href="#"class="btn btn-sm btn-outline-dark">Pass Grade</a></td>
                <td>
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
