

@extends('layouts.admin')
@section('content')

<div class="content-wrapper">

    <section class="content">
<h1>Replies</h1>

@include('admin.inclu.error')



<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Author</th>
      <th scope="col">Body</th>
      <th scope="col">Email</th>
      <th scope="col">Post</th>
{{--       <th scope="col">Created</th>
      <th scope="col">Updated</th> --}}
    </tr>
  </thead>
  <tbody>


@foreach($replies as $reply)

    <tr>
<th>{{ $reply->id }}</th>
<th>{{ $reply->author }}</th>
<th>{{ str_limit($reply->body , 30) }}</th>
<th>{{ $reply->email }}</th>
{{-- importttttttttttttt --}}
<th><a href="{{ route('home.post',$reply->comment->post->id) }}">View Post</a></th>
<td>
	@if($reply->is_active == 1)
		{{ Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) }}
		<input type="hidden" name="is_active" value="0">

		<div class="form-group">
			{{ Form::submit('Un-Approve',['class'=>'btn btn-success']) }}
		</div>

		{{ Form::close() }}

		@else


		{{ Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) }}
		<input type="hidden" name="is_active" value="1">

		<div class="form-group">
			{{ Form::submit('Approve',['class'=>'btn btn-info']) }}
		</div>

		{{ Form::close() }}


	@endif

	<td>
		{{ Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]]) }}


		<div class="form-group">
			{{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
		</div>

		{{ Form::close() }}

	</td>


</td>

{{-- <th>{{ $comment->created_at->diffForHumans() }}</th>
<th>{{ $comment->updated_at->diffForHumans() }}</th> --}}

    </tr>
@endforeach




  </tbody>
</table>






    </section>
    <!-- /.content -->
</div>

  @endsection
