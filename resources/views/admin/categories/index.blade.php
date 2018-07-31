@extends('layouts.admin')
@section('content')

  <div class="content-wrapper">

    <section class="content">
<h1>Categories</h1>

@include('admin.inclu.error')

<div class="col-sm-6">

{{ Form::open(['method'=>'POST','action'=>'AdminCategoryController@store','files'=>true]) }}
	    <div class="form-group">
    {{ Form::label('name','Category Name:') }}
    {{ Form::text('name',null,['class'=>'form-control']) }}
  </div>




  <div class="form-group">
    {{ Form::submit('Create Category',['class'=>'btn btn-primary']) }}
  </div>


{{ Form::close() }}


</div>


<div class="col-sm-6">
	

	@if($categories)
	<div class="table-responsive">
	<table class="table table-bordered">
		
		<thead>
		<tr>
			<td>Id</td>
			<td>Name</td>
			<td>Created At</td>
			

		</tr>	

		</thead>


		<tbody>

			@foreach($categories as $category)
			<tr>
				<td>{{ $category->id }}</td>
				<td><a href="{{ route('categories.edit',$category->id) }}">{{ $category->name }}</a></td>
				<td>{{ $category->created_at ? $category->created_at->diffForHumans() : 'no date' }}</td>

			</tr>
@endforeach
		</tbody>


	</table>

	{{ $categories->render() }}

@endif
</div>
</div>



    </section>
    <!-- /.content -->
  </div>

  @endsection
