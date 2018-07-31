@extends('layouts.admin')
@section('content')

  <div class="content-wrapper">

    <section class="content">
<h1>Create Posts</h1>

@include('admin.inclu.error')



{{ Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true]) }}

  <div class="form-group">
    {{ Form::label('title','Title:') }}
    {{ Form::text('title',null,['class'=>'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('category_id','Category:') }}
    {{ Form::select('category_id',[''=>'Choose Category']+$category,null,['class'=>'form-control']) }}
  </div>

    <div class="form-group">
    {{ Form::label('photo_id','Photo:') }}
    {{ Form::file('photo_id',null,['class'=>'form-control']) }}
  </div>

    <div class="form-group">
    {{ Form::label('body','Description:') }}
    {{ Form::textarea('body',null,['class'=>'form-control']) }}
  </div>




  <div class="form-group">
    {{ Form::submit('Create Post',['class'=>'btn btn-primary']) }}
  </div>


{{ Form::close() }}



    </section>
    <!-- /.content -->
  </div>

  @endsection
