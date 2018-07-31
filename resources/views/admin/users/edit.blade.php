


@extends('layouts.admin')
@section('content')

  <div class="content-wrapper">

    <section class="content">
<h1>Edit Users</h1>

<div class="col-sm-3">
 {{--  if user image not found --}}
<th><img src="{{ $user->photo ? asset('my_images')."/".$user->photo->file : 'http://placehold.it/400x400'  }}" class="img-responsive img-rounded"></th>
 

  {{-- <img src="{{$user->photo ? asset('my_images').'/'.$user->photo->file : 'http://placehold.it/400x400') }}" class="img-responsive img-rounded"> --}}
</div>

<div class="col-sm-9">
  


@include('admin.inclu.error')


{{ Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) }}

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
    {{ Form::select('role_id',$roles,null,['class'=>'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('status','Status:') }}
    {{ Form::select('is_active',[1=>'Active',0=>'Not Active'],null,['class'=>'form-control']) }}
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
    {{ Form::submit('Edit User',['class'=>'btn btn-primary col-sm-6']) }}
  </div>


{{ Form::close() }}
{{-- echo session in blade
  
@if(Session::has('deleted_user'))
<div class="alert alert-danger">
  {{ Session::get('deleted_user')}}
</div>
@endif --}}

{{ Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) }}

  <div class="form-group">
    {{ Form::submit('Delete User',['class'=>'btn btn-danger col-sm-6']) }}
  </div>

{{ Form::close() }}

    </section>
    <!-- /.content -->
  </div>
</div>
  @endsection

