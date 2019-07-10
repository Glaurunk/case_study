@if (Auth::guest())
<div class="row justify-content-center pt-3">
  <ul class="nav text-bigger">
    <li class="nav-item">
      <a class="nav-link" href="/students">Students</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/teachers">Teachers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/courses">Courses</a>
    </li>
  </ul>
</div>

  @elseif (Auth::user()->hasRole('admin'))
    Hello admin
  @elseif (Auth::user()->hasRole('teacher'))
    Hello Teacher
  @elseif (Auth::user()->hasRole('student'))
    Hello Student
@endif
