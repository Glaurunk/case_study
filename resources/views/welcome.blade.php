@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
  <div class="card">
    <div class="card-header">
      <h3>Welcome to The Class</h3></div>
      <div class="card-body">
      <h5>Use the nav menu to browse through the different sections of the database and don't forget to run <span class="text-danger">php artisan db:seed</span> to seed your database with the prepared seeders.</h5>
    </div>
  </div>
@endsection
