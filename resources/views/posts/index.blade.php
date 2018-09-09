@extends('main')

@section('title','|All Post')

@section('content')

	<div class = "row">
		<div class="col-md-10">
			<h1>All Posts</h1>
		</div>
		<div class ="col-md-2">
			<a href="{{route('posts.create')}}" class="btn btn-block btn-block btn-primary">create new post</a>		
		</div>
		<hr>
	</div>
	
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Body</th>
      <th scope="col">Created at</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

	@foreach($posts as $post)
  		
	    <tr>
	      <th scope="row">{{$post->id}}</th>
	      <td>{{$post->title}}</td>
	      <td>{{str_limit(strip_tags($post->body),30)}} {{ strlen(strip_tags($post->body)) > 50 ? "...." : "" }}</td>
	      <td>{{$post->created_at}}</td>
	      <td><a href="{{route('posts.show',$post->id)}}" class = "btn btn-default btn-sm">View</a> <a href="{{route('posts.edit',$post->id)}}" class = "btn btn-default btn-sm">Edit</a></td>
	    </tr>

    @endforeach

    
    
  </tbody>
</table>
	<div class="text-center">
    	{!!$posts->links();!!}
    </div>

@endsection