

@extends('layouts.admin')
@section('content')

<div class="content-wrapper">

    <section class="content">
<h1>Comments</h1>


@include('admin.inclu.error')

@if(count($comments) > 0)
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Author</th>
      <th scope="col">Body</th>
      <th scope="col">Email</th>
      <th scope="col">Post</th>
      <th scope="col">Reply</th>

    </tr>
  </thead>
  <tbody>

@foreach($comments as $comment)


    <tr>
<th>{{ $comment->id }}</th>
<th>{{ $comment->author }}</th>
<th>{{ str_limit($comment->body , 30) }}</th>
<th>{{ $comment->email }}</th>
{{-- importttttttttttttt --}}
<th><a href="{{ route('home.post',$comment->post->id) }}">View Post</a></th>
<th><a href="{{ route('replies.show',$comment->id) }}">View Reply</a></th>

<th>
	@if($comment->is_active == 1)
		{{ Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) }}
		<input type="hidden" name="is_active" value="0">

		<div class="form-group">
			{{ Form::submit('Un-Approve',['class'=>'btn btn-success']) }}
		</div>

		{{ Form::close() }}

		@else


		{{ Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) }}
		<input type="hidden" name="is_active" value="1">

		<div class="form-group">
			{{ Form::submit('Approve',['class'=>'btn btn-info']) }}
		</div>

		{{ Form::close() }}


	@endif

	<th>
		{{ Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]]) }}


		<div class="form-group">
			{{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
		</div>

		{{ Form::close() }}

	</th>


</th>

{{-- <th>{{ $comment->created_at->diffForHumans() }}</th>
<th>{{ $comment->updated_at->diffForHumans() }}</th> --}}

    </tr>

@endforeach



  </tbody>

</table>

{!! $comments->render() !!}


@else

<h1 class="text-center">No Comments</h1>


@endif

    </section>


    <!-- /.content -->
</div>


  @endsection
