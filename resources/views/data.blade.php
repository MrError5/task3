<div id="post-data">
@foreach($posts as $post)
                <!-- First Blog Post -->
                <h2>
                    <a href="#">{{ $post->title }}</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">{{ $post->user->name }}</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at->diffForHumans()  }}</p>
                <hr>
                <img class="img-responsive" src="{{ asset('my_images')."/".$post->photo->file }}" height="50">
                <hr>
                <p>{{ $post->body }}</a>

 <a class="btn btn-primary" href="{{ route('home.post',$post->id) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>

                

            
            @endforeach
            <!-- Blog Sidebar Widgets Column -->
   
      </div>
        <!-- /.row -->
