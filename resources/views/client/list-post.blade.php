@extends('layouts.client')
@section('title', $cate->name)
@section('content')
	@foreach ($listPost as $item)
		<div>
			<h2>{{$item->title}}</h2>
			<p>{{$item->content}}</p>
		</div>
	@endforeach
@endsection