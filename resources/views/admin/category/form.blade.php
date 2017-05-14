@extends('layouts.admin')
@section('title', 'New category')

@section('content')
<form action="" method="post" class="col-sm-6 col-sm-offset-3 form" novalidate>
	<div class="form-group">
      	<label for="name">Category name</label>
      	<input type="text" class="form-control" id="name" name="name" placeholder="Enter category name">
    </div>
	
</form>
@endsection