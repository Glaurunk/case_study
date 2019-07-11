@extends('layouts.app')

@section('title', 'Courses')

@section('content')
  <div class="card">
    <div class="card-header"><h3>Add a course</h3></div>
      <div class="card-body">
        <form class="form" action="{{ route('courses.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="courseName">Title</label>
            <input type="text" class="form-control" id="courseName" placeholder="Course Title" name="title" value="{{ old('title')}}" required>
            <small>Maximum of 255 characters</small>
          </div>

          <div class="form-group">
            <label for="courseTeacher">Assign a Teacher</label>
            @if (count($teachers) > 0)
              <select id="courseTeacher" class="form-control js-example-basic-single" name="teacher_id">
                  @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                  @endforeach
              </select>
              @else
                  <p class="text-danger"><strong>No teachers found in the registry! You can assign them later.</strong></p>
              @endif

              <div class="form-group  mt-3">
                <label for="courseStudents">Assign Student(s)</label>
                @if (count($students) > 0)
                  <select class="form-control js-example-basic-multiple" name="students[]" multiple="multiple">
                      @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                      @endforeach
                  </select>
                  @else
                      <p class="text-danger"><strong>No students found in the registry! You can assign them later.</strong></p>
                  @endif

            <div class="form-row mt-3">
              <div class="form-group col-3">
                <label for="courseDate">Course Date</label>
                <input id="courseDate" class="form-control" name="date" type="date" value="{{ old('date') }}" required>
              </div> <!-- Here ends form-group -->

              <div class="form-group col-3">
                <label for="courseStartTime">Course Starts At</label>
                <input id="courseStartTime" class="form-control" name="start" type="time" value="{{ old('start') }}" required>
              </div> <!-- Here ends form-group -->

              <div class="form-group col-3">
                <label for="courseEndTime">Course Ends At</label>
                <input id="courseEndTime" class="form-control" name="end" type="time" value="{{ old('end') }}" required>
              </div> <!-- Here ends form-group -->
            </div> <!-- Here ends form-row -->

          <button type="submit" class="btn btn-success mt-5">Add course</button>
        </form>
    </div> <!-- here ends card-body -->
  </div> <!-- here ends card -->


@endsection
