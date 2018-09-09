@extends('main')

@section('title','| Homepage')

@section('content')

      <div class="jumbotron">
        <h1 class="display-4">Hello, world!</h1>
        <p class="lead">Welcome to my blog</p>
     
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="#" role="button">More popular posts</a>
        </p>
      </div>
        
        <div class="row">
          <div class="container">
            @foreach($posts as $post)
            <div class="post">
              <h3><strong>{{$post->title}}</strong></h3>
              <p>{{substr(strip_tags($post->body),0 ,300)}}{{strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
              <p class="lead">
                <a  href="{{url('blog/'.$post->slug)}}" class=" btn-primary btn-lg" role="button">More </a>
              </p>
            </div>
            @endforeach
          </div>
        </div>
        
@endsection