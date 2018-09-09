@extends('main')

@section('title',"| $post->title")

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<div class = "row">
		<div class="col-md-8 col-md-offset-2">
			<h1>{{$post->title}}</h1>
			<img src ="{{ asset('images/'.$post->image) }}" height="400" width=" 400"> 
			<p>{!!$post->body!!}</p>
			<hr>
			<p>Posted In : {{ $post->category->name }} </p>
		</div>
	</div>
<br>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>  {{ $post->comments()->count() }} Comments</h3>
			@foreach($post->comments as $comment)
				<div class="comment">
					<div class="author-info">

						
						<div class="author-name">
							<h4>{{ $comment->name }}</h4>
							<p class="author-time">{{ date('F nS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
						</div>
						
					</div>

					<div class="comment-content">
						{{ $comment->comment }}
					</div>
					
				</div>
				<hr>
			@endforeach
		</div>
		
	</div>
<div class="row">

	<div class="comment-form col-md-8 col-md-offset-8" >
		<form action="{{ route('comments.store', $post->id ) }}  " method = "POST">
			{{ csrf_field() }}
			<div class= "col-md-6">
				<label class="mylabel" for ="name">Name</label>
				<input class="form-control" name="name" type="text" >
			</div>

			<div class= "col-md-6">
				<label class="mylabel" for ="email">Email</label>
				<input class= "form-control" name="email" type="email">
			</div>
			
			<div class= "col-md-6">
				<label class="mylabel" for ="comment">Comment</label>
				<textarea class="form-control" name="comment" cols="50" rows="5"></textarea>
			</div>
			<div class="col-md-6">
				<button class="btn btn-success btn-block" type="submit">Add Comment</button>
			</div>
		</form>
	</div>
</div>

@endsection