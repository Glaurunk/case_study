@extends('layouts.app')

@section('title', 'Teachers')

@section('content')
  <div class="card">
    <div class="card-header"><h3>Teachers Index</h3></div>
      <div class="card-body">

        @if (count($teachers) > 0)

        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Age</th>
              <th scope="col">Actions</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>

            @foreach ($teachers as $teacher)
              <tr>
                <th scope="row"><a href="{{ route('teachers.show', $teacher->id) }}">{{ $teacher->name}}</a></th>
                <td>{{ $teacher->email }}</td>
                <td>{{ $teacher->age}}</td>
                <td><a href="{{ route('teachers.update', $teacher->id) }}"class="btn btn-sm btn-outline-info">Update</a></td>
                <td>
                  <form class="" action="{{ route('teachers.destroy', $teacher->id) }}" method="post">
                    @csrf
                    @method('Delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button></td>
                  </form>
              </tr>
            @endforeach
          </tbody>
        </table>

        {{ $teachers->links() }}

      @else
        <h4>No teachers found in the database.</h4>
      @endif

      <hr>
      <div class="row justify-content-center">
        <a href="{{ route('teachers.create') }}" class="btn btn-outline-success">Add a teacher</a>
      </div> <!-- here ends row -->
    </div> <!-- here ends card-body -->
  </div> <!-- here ends card -->
@endsection
