@extends('layouts.client')
@section('title', $cate->name)
@section('content')
<div class="single_left_coloum_wrapper single_cat_left">
    <h2 class="title">{{$cate->name}}</h2>
    <a class="more" href="#">more</a>
    @foreach ($listPost as $item)
	    <div class="single_cat_left_content floatleft">
	    	<div class="image">
    			<img src="{{$item->feature_image}}" alt="">
	    	</div>
	        <h3>
	        	<a href="{{$item->getUrl()}}" title="">{{$item->title}}</a>
	        </h3>
	        {!!$item->short_description!!}
	    </div>
		
	@endforeach
</div>
	
@endsection