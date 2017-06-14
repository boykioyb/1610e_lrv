@extends('layouts.admin')
@section('title', 'New Post')

@section('content')

<form action="{{ route('post.save') }}" method="post" class="form" novalidate>
	{{csrf_field()}}
	<input type="hidden" name="id" value="{{$model->id}}">
	<div class="form-group">
      	<label for="title">Title <span class="text-danger">*</span></label>
      	<input type="text" class="form-control" value="{{$model->title}}" id="title" name="title" placeholder="Enter post title">
      	@if(asset($errors->first('title')))
      		<span class="text-danger">{{$errors->first('title')}}</span>
      	@endif
      	
    </div>
	<div class="form-group">
      	<label for="cate_id">Category</label>
      	<select name="cate_id" class="form-control">
      		@foreach($cates as $key => $val) {
              <option @if($val->id == $model->cate_id) selected @endif value="{{ $val->id }}">{{$val->name}}</option>";
          }
          @endforeach
      	</select>
    </div>
	<div class="image-preview"></div>
	<div class="form-group">
		<label for="feature_image">Feature Image</label>
		<input type="file" name="feature_image" id="feature_image"> 
	</div>
    <div class="form-group ">
		<label for="short_description">Short Description <span class="text-danger">*</span></label>
        <textarea class="form-control" name="short_description" id="short_description" rows="5"></textarea>
		@if(asset($errors->first('short_description')))
      		<span class="text-danger">{{$errors->first('short_description')}}</span>
      	@endif
    </div>
    <div class="form-group">
		<label for="content">Content <span class="text-danger">*</span></label>
        <textarea class="form-control" name="content" id="content" rows="10"></textarea>
		@if(asset($errors->first('content')))
      		<span class="text-danger">{{$errors->first('content')}}</span>
      	@endif
	</div>
    <div class="form-group text-center">
    	<button type="submit" class="btn btn-xs btn-success">
    		<i class="fa fa-save"></i> Save
    	</button>
    	<a href="{{route('post.list')}}" class="btn btn-xs btn-danger">
    		<i class="fa fa-remove"></i> Cancel
		</a>
    </div>
    
</form>
<script>
    ckeditor('short_description');
    ckeditor('content');
</script>
@endsection