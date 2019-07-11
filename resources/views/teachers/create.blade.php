@extends('layouts.app')

@section('title', 'Teachers')

@section('content')
  <div class="card">
    <div class="card-header"><h3>Add a Teacher</h3></div>
      <div class="card-body">
        <form class="form" action="{{ route('teachers.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="teacherName">Name</label>
            <input type="text" class="form-control" id="teacherName" placeholder="Name" name="name" value="{{ old('name')}}" required>
            <small>Minimum of 5 characters</small>
          </div>
          <div class="form-group">
            <label for="teacherEmail">Email address</label>
            <input type="email" class="form-control" id="teacherEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ old('email') }}" required>
          </div>
          <div class="form-group">
            <label for="teacherAge">Age</label>
            <input id="teacherAge" class="form-control" name="age" type="number" value="{{ old('age') }}"required>
            <small>Please enter teacher's age</small>
          </div>

          <button type="submit" class="btn btn-success">Add Teacher</button>
        </form>
    </div> <!-- here ends card-body -->
  </div> <!-- here ends card -->
@endsection
