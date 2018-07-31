@extends('layouts.admin')
@section('content')

  <div class="content-wrapper">

    <section class="content">
<h1>Posts</h1>


{{-- FOR eCho Session --}}
      @if(Session::has('deleted_post'))

          <div class="alert alert-danger">
            {{ Session::get('deleted_post')}}
          </div>

      @endif
{{-- FOR eCho Session --}}


@include('admin.inclu.error')

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Photo</th>
      <th scope="col">Owner</th>
      <th scope="col">Category</th>
      <th scope="col">Title</th>
      <th scope="col">Body</th>
      <th scope="col">Post</th>
      <th scope="col">Comment</th>
      <th scope="col">Created</th>
      <th scope="col">Updated</th>
    </tr>
  </thead>
  <tbody>

@foreach($posts as $post)


    <tr>
<th>{{ $post->id }}</th>
<th><img src="{{ asset('my_images')."/".$post->photo->file ? : 'no image' }}" height="50"></th>
<th>{{ $post->user->name }}</th>
<th>{{ $post->category->name }}</th>
<th><a href="{{ route('posts.edit',$post->id) }}">{{ $post->title }}</a></th>
<th>{{ str_limit($post->body , 30) }}</th>
<th><a href="{{ route('home.post',$post->id) }}">View Post</a></th>
<th><a href="{{ route('comments.show',$post->id) }}">View comment</a></th>

<th>{{ $post->created_at->diffForHumans() }}</th>
<th>{{ $post->updated_at->diffForHumans() }}</th>

    </tr>
@endforeach



  </tbody>
</table>

<div class="row">
<div class="col-sm-6 col-sm-offset-5">
  
{{ $posts->render() }}
</div>  

</div>


    </section>
    <!-- /.content -->
  </div>

  @endsection
