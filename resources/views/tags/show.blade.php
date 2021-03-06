@extends('main')

@section('title',"|$tag->name Tag")

@section('content')
<link rel="stylesheet" type="text/css" href="css/select2.min.css">
	<div class="row">
		<div class="col-md-8">
			
	<h1>{{ $tag->name }} Tag | <small>{{ $tag->posts()->count() }} associated post</small> </h1>

		</div>
		<div class="col-md-3">
			<a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-primary btn-block pull-right">Edit</a>
		
	
			<form method="POST" action="{{route('tags.destroy', $tag->id) }} ">
				{{ csrf_field() }}
     			{{ method_field('DELETE') }}
				<input type="submit" value="Delete" class="btn btn-danger btn-block">
			</form>
		</div>
</div>

<div class="row">
	<div class="col-md-12">
<table class ="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Title</th>
			<th>Tag</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($tag->posts as $post)
		<tr>
			<th>{{ $post->id }}</th>
			<td>{{ $post->title }}</td>
			<td>
				@foreach($post->tags as $tag)
					<span class="label label-default">{{ $tag->name }}</span>
				@endforeach
			</td>
			<td><a href="{{ route('posts.show',$post->id) }}" class="btn btn-default btn-sm">View</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
	</div>
	
</div>
@endsection

