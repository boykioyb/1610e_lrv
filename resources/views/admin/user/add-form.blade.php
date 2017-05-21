@extends('layouts.admin')
@section('title', 'Add new user')
@section('content')
<form action="" method="get" novalidate enctype="multipart/form-data">
  <div class="col-md-6">
    <div class="form-group">
      <label for="email">Email: </label>
      <input autofocus type="email" class="form-control" name="email" id="email" placeholder="Email...">
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
      <img id="target-avatar" src="{{asset('images/default-avatar.png')}}" width="152" alt="">
    </div>
    <div class="form-group">
      <label for="avatar">Avatar:</label>
      <input type="file" onchange="readURL(this)" name="avatar" id="avatar" placeholder="User avatar" class="form-control">
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

@section('js')
<script type="text/javascript">
  function readURL(input) {
    var url = input.value;
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#target-avatar').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }else{
         $('#target-avatar').attr('src', '/public/images/default-avatar.png');
    }
  }
</script>
@endsection