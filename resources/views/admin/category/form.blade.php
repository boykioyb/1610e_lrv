@extends('layouts.admin')
@section('title', 'New category')

@section('content')

@php
  $tree = get_options($cates, 0, "", $model->id);
  
@endphp
<form action="{{ route('cate.save') }}" method="post" class="col-sm-6 col-sm-offset-3 form" novalidate>
	{{csrf_field()}}
	<input type="hidden" name="id" value="{{$model->id}}">
	<div class="form-group">
      	<label for="name">Category name</label>
      	<input type="text" class="form-control" value="{{$model->name}}" id="name" name="name" placeholder="Enter category name">
      	@if(asset($errors->first('name')))
      		<span class="text-danger">{{$errors->first('name')}}</span>
      	@endif
      	
    </div>
	<div class="form-group">
      	<label for="parent_id">Parent</label>
      	<select name="parent_id" class="form-control">
      		<option value="0">---Select a category---</option>
      		@foreach($tree as $key => $val) {
              <option value="{{substr($key, 1)}}">{{$val}}</option>";
          }
          @endforeach
      	</select>
    </div>
    <div class="form-group text-center">
    	<button type="submit" class="btn btn-xs btn-success">
    		<i class="fa fa-save"></i> Save
    	</button>
    	<a href="{{route('cate.list')}}" class="btn btn-xs btn-danger">
    		<i class="fa fa-remove"></i> Cancel
		</a>
    </div>

	
</form>
@endsection