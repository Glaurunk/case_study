@extends('layouts.app')

@section('title', 'Students')

@section('content')
  <div class="card">
    <div class="card-header"><h3>Add a Student</h3></div>
      <div class="card-body">
        <form class="form" action="{{ route('students.store')}}" method="post">
          @csrf
          <div class="form-group">
            <label for="studentName">Name</label>
            <input type="text" class="form-control" id="studentName" placeholder="Name" name="name" value="{{ old('name')}}" required>
            <small>Minimum of 5 characters</small>
          </div>
          <div class="form-group">
            <label for="studentEmail">Email address</label>
            <input type="email" class="form-control" id="studentEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ old('email') }}" required>
          </div>
          <div class="form-group">
            <label for="studentAge">Age</label>
            <input id="studentAge" class="form-control" name="age" type="number" value="{{ old('age') }}"required>
            <small>Please enter student's age</small>
          </div>

          <button type="submit" class="btn btn-success">Add Student</button>
        </form>
    </div> <!-- here ends card-body -->
  </div> <!-- here ends card -->
@endsection
