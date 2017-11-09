@extends('layouts.client')
@section('title', $cate->name)
@section('content')
<div>
    <h2>{{$post->title}}</h2>
    <div><i><a href="{{$cate->getUrl()}}" title="">{{$cate->name}}</a></i></div>
    <div>
    	{!! $post->short_description !!}
    </div>
    <div style="width: 400px; text-align: center; margin: auto;">
    	<img src="{{$post->feature_image}}" alt="">
    </div>
    <div>
    	{!! $post->content !!}
    </div>
</div>
	
@endsection