


@extends('layouts.admin')
@section('content')

  <div class="content-wrapper">

    <section class="content">

{{-- FOR eCho Session --}}
      @if(Session::has('deleted_user'))

          <div class="alert alert-danger">
            {{ Session::get('deleted_user')}}
          </div>

      @endif
{{-- FOR eCho Session --}}


<h1>Users</h1>
<div class="table-responsive">

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Photo</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Active</th>
      <th scope="col">Created</th>
      <th scope="col">Updated</th>
    </tr>
  </thead>
  <tbody>

@foreach($users as $user)


    <tr>
<th>{{ $user->id }}</th>
{{-- <th><img height="50" src="../my_images/{{ $user->photo ? $user->photo->file : 'No Image' }}"></th> --}}
{{-- <th> <img src="{{asset('my_images/'.$user->photo ? asset('my_images').'/'.$user->photo->file : 'http://placehold.it/400x400') }}" class="img-responsive img-rounded"></th> --}}
<th><img src="{{ $user->photo ? asset('my_images')."/".$user->photo->file : 'http://placehold.it/400x400'  }}" height="50"></th>
<th><a href="{{ route('users.edit',$user->id) }}">{{ $user->name }}</a></th>
<th>{{ $user->email }}</th>
<th>{{ $user->role->name }}</th>
<th>{{ $user->is_active == 1 ?'active' :'Not Active'  }}</th>
<th>{{ $user->created_at->diffForHumans() }}</th>
<th>{{ $user->updated_at->diffForHumans() }}</th>

    </tr>
@endforeach


  </tbody>
</table>



</div>

<div class="row">
<div class="col-sm-6 col-sm-offset-5">
  
{{ $users->render() }}
</div>  

</div>
    </section>
    <!-- /.content -->
  </div>

  @endsection

