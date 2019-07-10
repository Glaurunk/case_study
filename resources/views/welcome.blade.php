@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
  <div class="card">
    <div class="card-header">
      <h3>Welcome to our class. Please log in to an account type to continue</h3></div>
      <div class="card-body">

      <h4>Account types</h4>
      <ul class="list-group">
          <li class="list-group-item"><em>Administrator: </em>Can create and delete users. Can create and delete courses. Can assign teachers and students to courses.</li>
          <li class="list-group-item"><em>Teacher: </em>Can insert and view grades in the courses he is assigned to.</li>
          <li class="list-group-item"><em>Student: <em>Can view his own grades.</li>
      </ul>
      <p></p>
    </div>
  </div>
@endsection
