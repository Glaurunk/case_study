@extends('layouts.app')

@section('title', 'Courses')

@section('content')
  <div class="card">
    <div class="card-header"><h3>Edit Courses</h3></div>
      <div class="card-body">
        <form class="form" action="{{ route('courses.update', $course->id) }}" method="post">
          @csrf
          @method('PATCH')
          <div class="form-group">
            <label for="courseName">Title</label>
            <input type="text" class="form-control" id="courseName" placeholder="Course Title" name="title" value="{{ old('title') ? old('title') : $course->title }}" required>
            <small>Maximum of 255 characters</small>
          </div>

           <div class="form-group">
            <label for="courseTeacher">Assign a Teacher</label>
            @if (count($teachers) > 0)
              <select class="form-control js-example-basic-single" name="teacher_id">
                  @foreach ($teachers as $teacher)
                    <option
                      value="{{ $teacher->id }}"
                      @if ($teacher->id == $course->teacher_id)
                        selected
                      @endif
                      >{{ $teacher->name }}
                    </option>
                  @endforeach
              </select>

              @else
                  <p class="text-danger"><strong>No teachers found in the registry! You can assign them later.</strong></p>
              @endif

              <div class="form-group mt-3">
                <label for="courseTeacher">Add / Remove Students </label>
                @if (count($students) > 0)
                  <select class="form-control js-example-basic-multiple" name="students[]" multiple="multiple">
                      @foreach ($students as $student)
                        <option
                          @if (in_array($student->id, $course->students->pluck('id')->toArray()))
                            selected
                          @endif
                          value="{{ $student->id }}">{{ $student->name }}
                        </option>
                      @endforeach
                  </select>
                      @if (count($course->students) == 0)
                        <small class="text-danger">
                            NO STUDENTS ARE ASSIGNED TO THIS COURSE
                        </small>
                      @endif

                  @else
                      <p class="text-danger"><strong>No students found in the registry! You can assign them later.</strong></p>
                  @endif

            <div class="form-row mt-3">
              <div class="form-group col-3">
                <label for="courseDate">Course Date (new date)</label>
                <input id="courseDate" class="form-control" name="date" type="date" value="{{ old('date') ? old('date') : $course->date }}" required>
                <small>current value: {{ $course->date }}</small>
              </div> <!-- Here ends form-group -->

            <div class="form-group col-3">
                <label for="courseStartTime">Course Starts At (new time)</label>
                <input id="courseStartTime" class="form-control" name="start" type="time" value="{{ old('start') ? old('start') : $course->start_time }}" required>
                <small>current value: {{ $course->start_time }}</small>

                </div> <!-- Here ends form-group -->
              <div class="form-group col-3">
                <label for="courseEndTime">Course Ends At (new time)</label>
                <input id="courseEndTime" class="form-control" name="end" type="time" value="{{ old('end') ? old('end') : $course->end_time }}" required>
                <small>current value: {{ $course->end_time }}</small>

              </div> <!-- Here ends form-group -->
            </div> <!-- Here ends form-row -->

            <div class="row mt-5">
              <div class="col-2">
                <button type="submit" class="btn btn-info">Submit Changes</button>
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
            <hr>

    </div> <!-- here ends card-body -->
  </div> <!-- here ends card -->
@endsection
