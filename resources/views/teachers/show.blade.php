@extends('layouts.app')

@section('title', 'Teachers')

@section('content')
  <div class="card">
    <div class="card-header"><h3>Teacher Card # {{ $teacher->id }}</h3></div>
    <div class="card-body">
      <h5>teacher Name: {{ $teacher->name }}</h5>
      <h5>teacher Email: {{ $teacher->email }}</h5>
      <h5>teacher Age: {{ $teacher->age }}</h5>
      <hr>

      @if (count($teacher->courses) > 0)

        <h5>{{ $teacher->name }} teaches the following courses:</h5>
        <table class="table mt-3">
          <thead>
            <tr>
              <th scope="col">Course Title</th>
              <th scope="col">Attending Students</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($teacher->courses as $course)
              <tr>
                <td><a href="{{ route('courses.show', $course->id) }}">{{ $course->title}}</a>
                </td>
                <td>{{ count($course->students) }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>

      @else
        <h4 class="text-danger">This teachers has no assigned courses</h4>
      @endif

      <div class="row mt-5">
        <div class="col-2">
          <a href="{{ route('teachers.edit', $teacher->id) }}"class="btn btn-info">Update Teacher Info</a>
        </div>
      </form>
        <div class="col-2">
          <form class="" action="{{ route('teachers.destroy', $teacher->id) }}" method="post">
            @csrf
            @method('Delete')
            <button type="submit" class="btn btn-danger">Delete Teacher</button></td>
          </form>
        </div> <!-- here ends col -->
      </div> <!-- here ends row -->

    </div> <!-- Here ends card-body -->
  </div> <!-- Here ends card -->
@endsection
