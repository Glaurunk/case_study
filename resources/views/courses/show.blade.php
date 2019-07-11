@extends('layouts.app')

@section('title', 'Courses')

@section('content')
  <div class="card">
    <div class="card-header"><h3>Course Card # {{ $course->id }}</h3></div>
      <div class="card-body">
        <h5>Title: {{ $course->title }}</h5>
        <h5>Teacher:
          @if ($course->teacher)
            <a href="{{ route('teachers.show', $course->teacher->id) }}">{{ $course->teacher->name }}</a>
          @else
            <span class="text-danger">TEACHER MISSING!</span>
          @endif
        </h5>
        <h5>Time Schedule: {{ $course->dateFormated() }}, from {{ $course->start_timeFormated() }} to {{ $course->end_timeFormated() }}</h5>
        <hr>

      @if (count($course->students) > 0)
        <h5>The following students have enrolled for this course</h5>
        <table class="table">
          <thead class="">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Grade</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            @foreach ($course->students as $student)
              <tr>
                <th scope="row"><a href="{{ route('students.show', $student->id) }}">{{ $student->name }}</a></th>
                <td>
                  @php
                    $grade = $course->students->find($student->id)->pivot->grade
                  @endphp

                  <select class="form-control" id="grade_{{ $course->id }}_{{ $student->id }}">
                    <option value="">Choose Grade...</option>
                    <option @if ($grade == 1)selected @endif value="1">FAIL</option>
                    <option @if ($grade == 2)selected @endif value="2">PASS</option>
                    <option @if ($grade == 3)selected @endif value="3">GOOD</option>
                    <option @if ($grade == 4)selected @endif value="4">VERY GOOD</option>
                    <option @if ($grade == 5)selected @endif value="5">EXCELLECT</option>
                  </select>
                </td>
                <td><div class="d-none" id="message_{{ $course->id }}_{{ $student->id }}">OK</div></td>
              </tr>
            @endforeach


                 {{-- <td><input min="0" max="10" type="number" class="form-control" id="grade_{{ $course->id }}_{{ $student->id }}" value=""></td>
                <td><div class="d-none" id="message_{{ $course->id }}_{{ $student->id }}">OK</div></td> --}}

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

@section('footer')
  <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $(document).ready(function () {

        $('body').on("change", '[id^="grade_"]', function (e) {
            e.preventDefault();
            var id = $(this).attr('id');
            var grade = $(this).val();

            console.log
            exploded = id.split('_');
            $.ajax({
                url: APP_URL + '/grades',
                dataType: 'json',
                type: 'post',
                data: {course_id: exploded[1], student_id: exploded[2], grade: grade  },
                success: function (data, textStatus, jQxhr) {
                      if (data.message == "success") {
                        $('#message_'+exploded[1]+'_'+exploded[2]).removeClass('d-none');
                      }
                    },
                error: function (jqXhr, textStatus, errorThrown) {

                }
            });
        });
    });
</script>
@endsection
