


@extends('layouts.admin')
@section('content')

  <div class="content-wrapper">

    <section class="content">
<h1>Media</h1>

@include('admin.inclu.error')
@if($photos)
<div class="table-responsive">

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Created At</th>

    </tr>
  </thead>
  <tbody>

@foreach($photos as $photo)


    <tr>
<th>{{ $photo->id }}</th>
<th><img height="50" src="{{ asset('my_images')."/". $photo->file }} "></th>
<th>{{ $photo->created_at->diffForHumans() }}</th>
<th>
	{{ Form::open(['method'=>'DELETE','action'=>['AdminMediasController@destroy',$photo->id]]) }}


<div class="form-group">
	{{ Form::submit('Delete Media',['class'=>'btn btn-danger']) }}
</div>
	{{ Form::close() }}
</th>

    </tr>
@endforeach


  </tbody>
</table>


@endif
</div>

<div class="row">
<div class="col-sm-6 col-sm-offset-5">
  
{{ $photos->render() }}
</div>  

</div>

    </section>
    <!-- /.content -->
  </div>

  @endsection
