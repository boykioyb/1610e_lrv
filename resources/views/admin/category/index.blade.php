@extends('layouts.admin')
@section('title', 'Quản lý danh mục')
@section('content')

<div class="box-body table-responsive no-padding">
  <table class="table table-hover">
    <tbody>
    <tr>
      <th>ID</th>
      <th>Tên danh mục</th>
      <th>Danh mục cha</th>
      <th>
        <a href="{{route('cate.add-new')}}" class="btn btn-success btn-xs">
          <i class="fa fa-plus"></i> Add new
        </a>
      </th>
    </tr>
    @foreach ($cates as $element)
      
    	<tr>
	      <td>{{$element->id}}</td>
	      <td>{{$element->name}}</td>
	      <td>{{$element->parentName()}}</td>
	      <td>
	      	<a href="{{ route('cate.update', ['id' => $element->id]) }}" class="btn btn-info btn-xs">
	      		<i class="fa fa-pencil"></i> Update
	      	</a>
	      	<a href="{{route('cate.destroy', ['id' => $element->id])}}" class="btn btn-danger btn-xs">
	      		<i class="fa fa-remove"></i> Remove
	      	</a>
	      </td>
	    </tr>
    @endforeach
  </tbody>
  </table>
</div>
@endsection