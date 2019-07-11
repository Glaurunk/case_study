@extends('layouts.app')

@section('title', 'Students')

@section('content')
  <div class="card">
    <div class="card-header"><h3>Edit Student Record</h3></div>
      <div class="card-body">
        <form class="form" action="{{ route('students.update', $student->id) }}" method="post">
          @csrf
          @method('PATCH')
          <div class="form-group">
            <label for="studentName">Name</label>
            <input type="text" class="form-control" id="studentName" placeholder="Name" name="name" value="{{ old('name') ? old('name') : $student->name }}" required>
            <small>Minimum of 5 characters</small>
          </div>
          <div class="form-group">
            <label for="studentEmail">Email address</label>
            <input readonly type="email" class="form-control" id="studentEmail" aria-describedby="emailHelp" placeholder="Email" name="email" value="{{ old('email') ? old('email') : $student->email }}" required>
            <small>Email is unique and cannot be changed</small>
          </div>
          <div class="form-group">
            <label for="studentAge">Age</label>
            <input type="number" id="studentAge" class="form-control" name="age" value="{{ old('age') ? old('age') : $student->age }}" placeholder="Age" required>
            <small>Please enter student's age</small>
          </div>

          <div class="row mt-5">
            <div class="col-2">
              <button type="submit" class="btn btn-info">Submit Changes</button>
            </div>
          </form>
            <div class="col-2">
              <form class="" action="{{ route('students.destroy', $student->id) }}" method="post">
                @csrf
                @method('Delete')
                <button type="submit" class="btn btn-danger">Delete Student</button></td>
              </form>
            </div> <!-- here ends col -->
          </div> <!-- here ends row -->


    </div> <!-- here ends card-body -->
  </div> <!-- here ends card -->
@endsection
