@extends('layouts.admin')
@section('title', 'Add new user')
@section('content')
<form action="" method="get" novalidate>
  <div class="col-md-6">
    <div class="form-group">
      <label for="email">Email: </label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Email...">
    </div>
    <div class="form-group">
      <label for="password">Password: </label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Password...">
    </div>
    <div class="form-group">
      <label for="cfpassword">Confirm Password: </label>
      <input type="password" class="form-control" name="cfpassword" id="cfpassword" placeholder="Confirm Password...">
    </div>
    <div class="form-group">
      <label for="role">User role: </label>
      <select name="role" class="form-control">
        <option value="">Member</option>
        <option value="">Moderator</option>
        <option value="">Administrator</option>
      </select>
    </div>
  </div>
  <div class="col-md-6">
    <div class="row text-center">
      <img src="{{asset('images/default-avatar.png')}}" width="152" alt="">
    </div>
    <div class="form-group">
      <label for="avatar">Avatar:</label>
      <input type="file" name="avatar" id="avatar" placeholder="User avatar" class="form-control">
    </div>
    <div class="form-group">
      <label for="username">User name:</label>
      <input type="text" name="name" id="username" placeholder="User name" class="form-control">
    </div>
  </div>
  <div class="col-md-12 text-right">
    <button type="submit" class="btn btn-success btn-sm">Save</button>
    <a href="{{route('dashboard')}}" class="btn btn-danger btn-sm">Cancel</a>
  </div>
</form>
@endsection