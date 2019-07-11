@extends('layouts.app')

@section('title', 'Teachers')

@section('content')
  <div class="card">
    <div class="card-header"><h3>Edit Teacher Record</h3></div>
      <div class="card-body">
        <form class="form" action="{{ route('teachers.update', $teacher->id) }}" method="post">
          @csrf
          @method('PATCH')
          <div class="form-group">
            <label for="teacherName">Name</label>
            <input type="text" class="form-control" id="teacherName" placeholder="Name" name="name" value="{{ old('name') ? old('name') : $teacher->name }}" required>
            <small>Minimum of 5 characters</small>
          </div>
          <div class="form-group">
            <label for="teacherEmail">Email address</label>
            <input readonly type="email" class="form-control" id="teacherEmail" aria-describedby="emailHelp" placeholder="Email" name="email" value="{{ $teacher->email }}" required>
            <small>Email is unique and cannot be changed</small>
          </div>
          <div class="form-group">
            <label for="teacherAge">Age</label>
            <input type="number" id="teacherAge" class="form-control" name="age" value="{{ old('age') ? old('age') : $teacher->age }}" placeholder="Age" required>
            <small>Please enter teacher's age</small>
          </div>

          <div class="row mt-5">
            <div class="col-2">
              <button type="submit" class="btn btn-info">Submit Changes</button>
            </div>
          </form>
            <div class="col-2">
              <form class="" action="{{ route('teachers.destroy', $teacher->id) }}" method="post">
                @csrf
                @method('Delete')
                <button type="submit" class="btn btn-danger">Delete teacher</button></td>
              </form>
            </div> <!-- here ends col -->
          </div> <!-- here ends row -->


    </div> <!-- here ends card-body -->
  </div> <!-- here ends card -->
@endsection
