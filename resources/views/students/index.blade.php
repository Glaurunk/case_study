@extends('layouts.app')

@section('title', 'Students')

@section('content')
  <div class="card">
    <div class="card-header"><h3>Students Index</h3></div>
      <div class="card-body">

        @if (count($students) > 0)

        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Courses</th>
              <th scope="col">Age</th>
              <th scope="col">Actions</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>

            @foreach ($students as $student)
              <tr>
                <th scope="row"><a href="{{ route('students.show', $student->id) }}">{{ $student->name}}</a></th>
                <td>{{ $student->email }}</td>
                <td>{{ count($student->courses) }}</td>
                <td>{{ $student->age}}</td>
                <td><a href="{{ route('students.edit', $student->id) }}"class="btn btn-sm btn-outline-info">Update</a></td>
                <td>
                  <form class="" action="{{ route('students.destroy', $student->id) }}" method="post">
                    @csrf
                    @method('Delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button></td>
                  </form>
              </tr>
            @endforeach
          </tbody>
        </table>

        {{ $students->links() }}

      @else
        <h4>No students found in the database.</h4>
      @endif

      <hr>
      <div class="row justify-content-center">
        <a href="{{ route('students.create') }}" class="btn btn-outline-success">Add a Student</a>
      </div> <!-- here ends row -->
    </div> <!-- here ends card-body -->
  </div> <!-- here ends card -->
@endsection
