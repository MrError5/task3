


@extends('layouts.admin')
@section('content')

  <div class="content-wrapper">

    <section class="content">
<h1>Upload Media</h1>

@include('admin.inclu.error')

{{ Form::open(['method'=>'post','action'=>'AdminMediasController@store','class'=>'dropzone']) }}



{{ Form::close() }}
    </section>
    <!-- /.content -->
  </div>

  @endsection



