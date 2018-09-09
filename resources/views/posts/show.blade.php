@extends('main')

@section('title','|View Post')

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
	<div class="row">
		<div class ="col-md-8">
			<h1>{{ $post->title }}</h1>
			<p class="lead">{!! $post->body !!} </p>
			<p class="lead">{{ $post->category->name }} </p>
			<p class="lead">
				@foreach($post->tags as $tag)
					<span class="label label-default">{{ $tag->name }}</span>
					
				@endforeach
			</p>
			<div id="backend-comments">
			<h3>Comments <small>{{ $post->comments()->count() }}</small></h3>
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Comment</th>
						<th></th>
					</tr>
				</thead>		

				<tbody>
					@foreach($post->comments as $comment)
						<tr>
							<td>{{ $comment->name }}</td>
							<td>{{ $comment->email }}</td>
							<td>{{ $comment->comment }}</td>
							<td><a href="{{ route('comments.edit',$comment->id) }}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-comment">edit</span></a>

							<form method="POST" action="{{route('comments.destroy', $comment->id) }} ">
								{{ csrf_field() }}
				     			{{ method_field('DELETE') }}
								<button type="submit" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-comment">Delete</span></button>
							</form>
						</tr>
					@endforeach
				</tbody>	
			</table>
		</div>
		</div>		
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>URL:</dt>
					<a href="{{url('blog/'.$post->slug)}}">{{route('blog.single',$post->slug)}}</a>
				</dl>
				<dl class="dl-horizontal">
					<dt>created at:</dt>
					<dt>{{date('M j, Y h:ia ',strtotime($post->created_at)) }}</dt>
				</dl>
				<dl class="dl-horizontal">
					<dt>updated at:</dt>
					<dt>{{date('M j, Y h:ia',strtotime($post->updated_at)) }}</dt>
				</dl>
				<hr>
				<div class="row">

					<div class="col-md-6">
						<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a>
					</div>
					<div class="col-md-6">
						<form method="POST" action="{{route('posts.destroy', $post->id) }} ">
							{{ csrf_field() }}
			     			{{ method_field('DELETE') }}
							<input type="submit" value="Delete" class="btn btn-danger btn-block">
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>

@endsection