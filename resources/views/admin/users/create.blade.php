


@extends('layouts.admin')
@section('content')

  <div class="content-wrapper">

    <section class="content">
<h1>Create Users</h1>

@include('admin.inclu.error')


{{ Form::open(['method'=>'POST','action'=>'AdminUsersController@store','files'=>true]) }}

  <div class="form-group">
    {{ Form::label('name','Name:') }}
    {{ Form::text('name',null,['class'=>'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('email','Email:') }}
    {{ Form::email('email',null,['class'=>'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('role_id','Role:') }}
    {{ Form::select('role_id',[''=>'Choose Options']+$roles,null,['class'=>'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('is_active','Status:') }}
    {{ Form::select('is_active',[''=>'Choose Options',1=>'Active',0=>'Not Active'],null,['class'=>'form-control']) }}
  </div>

    <div class="form-group">
    {{ Form::label('photo_id','Photo:') }}
    {{ Form::file('photo_id',['class'=>'form-control']) }}
  </div>

    <div class="form-group">
    {{ Form::label('password','Password:') }}
    {{ Form::password('password',['class'=>'form-control']) }}
  </div>


  <div class="form-group">
    {{ Form::submit('Create User',['class'=>'btn btn-primary']) }}
  </div>

{{ Form::close() }}



    </section>
    <!-- /.content -->
  </div>

  @endsection

