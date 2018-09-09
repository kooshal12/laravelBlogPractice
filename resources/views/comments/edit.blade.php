@extends('main')

@section('title','|Edit Comment')

@section('content')

	<div class="row">
		<div class ="col-md-8">
			<h1>Edit Comment</h1>
			<div class="row">

			<div class="comment-form col-md-8 col-md-offset-8" >
				<form action="{{ route('comments.update', $comment->id ) }}" method = "POST">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class= "col-md-6">
						<label class="mylabel" for ="name">Name</label>
						<input class="form-control"  name="name" type="text" value="{{ $comment->name }}" disabled>
					</div>

					<div class= "col-md-6">
						<label class="mylabel" for ="email">Email</label>
						<input class= "form-control" name="email" type="email" value="{{ $comment->email }}" disabled>
					</div>
					
					<div class= "col-md-6">
						<label class="mylabel" for ="comment">Comment</label>
						<textarea class="form-control" name="comment" cols="50" rows="5" value ="">{{ $comment->comment }}</textarea>
					</div>
					<div class="col-md-6">
						<button class="btn btn-success btn-block" type="submit">Edit Comment</button>
					</div>
				</form>
			</div>


		</div>
	</div>

@endsection