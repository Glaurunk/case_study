@if (Auth::guest())
  Hello guest
  @elseif (Auth::user()->hasRole('admin'))
    Hello admin
  @elseif (Auth::user()->hasRole('teacher'))
    Hello Teacher
  @elseif (Auth::user()->hasRole('student'))
    Hello Student
@endif
