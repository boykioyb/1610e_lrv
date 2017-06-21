@extends('layouts.admin')
@section('title', 'New Post')

@section('content')

<form action="{{ route('post.save') }}" method="post" class="form" enctype="multipart/form-data" novalidate>
	{{csrf_field()}}
	<input type="hidden" name="id" value="{{$model->id}}">
  <div class="form-group">
        <label for="title">Title <span class="text-danger">*</span></label>
        <input type="text" class="form-control" value="{{$model->title}}" id="title" name="title" placeholder="Enter post title">
        @if(asset($errors->first('title')))
          <span class="text-danger">{{$errors->first('title')}}</span>
        @endif
    </div>
	<div class="form-group relative">
      	<label for="slug">URL <span class="text-danger">*</span></label>
      	<input type="text" class="form-control" value="{{$slug}}" id="slug" name="slug" placeholder="Post slug">
        <button type="button" id="generate-slug" class="add-on-input-post-form btn btn-sm btn-success">Generate slug</button>
      	@if(asset($errors->first('slug')))
      		<span class="text-danger">{{$errors->first('slug')}}</span>
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
	<div class="image-preview">
    @if($model->feature_image)
      <img width="100" src="{{asset($model->feature_image)}}" alt=""> 
    @endif
  </div>
	<div class="form-group">
		<label for="feature_image">Feature Image</label>
		<input type="file" name="feature_image" id="feature_image"> 
		    @if(asset($errors->first('feature_image')))
      		<span class="text-danger">{{$errors->first('feature_image')}}</span>
      	@endif
	</div>
    <div class="form-group ">
		<label for="short_description">Short Description <span class="text-danger">*</span></label>
        <textarea class="form-control" name="short_description" id="short_description" rows="5">{{$model->short_description}}</textarea>
		    @if(asset($errors->first('short_description')))
      		<span class="text-danger">{{$errors->first('short_description')}}</span>
      	@endif
    </div>
    <div class="form-group">
		<label for="content">Content <span class="text-danger">*</span></label>
        <textarea class="form-control" name="content" id="content" rows="10">{{$model->content}}</textarea>
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
@section('js')
  <script type="text/javascript">
    $(document).ready(function(){
      $('#generate-slug').on('click', function(){
          var title = $('#title').val();
          $.ajax({
            url: '{{route('generate.slug')}}',
            method: "POST",
            data: {
              _token: '{{csrf_token()}}',
              title: title
            },
            dataType: "JSON",
            success: function (rp){
              $('#slug').val(rp.slug);
            },
            error: function(xhr, error, msg){
              console.log(msg);
            }
          });
      });
    });
  </script>
@endsection