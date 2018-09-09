@extends('main')

@section('title','|Edit Post')

@section('content')
<link rel="stylesheet" type="text/css" href="css/select2.min.css">
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'link code',
			menubar: false
		});
	</script>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

	<div class="container">
		<h1>Edit Post</h1>
		<hr>	
		<form method="POST" action="{{route('posts.update', $post->id) }} " enctype="multipart/form-data">
			     {{ csrf_field() }}
			      {{ method_field('PUT') }}
      		<div class="row">
				<div class="col-md-8">
					<div class="form-group">
			       		<label name="title">Title:</label>
			         	<input id="title" name="title" class="form-control" value="{{$post->title}}">
			      	</div>
			      	<div class="form-group">
			        	<label name="body">Body:</label>
			        	<textarea id="body" name="body" h="50" rows="10" class="form-control" >{{$post->body}}</textarea>
			      	</div>
			      	<div class="form-group">
				        <label name="slug">Slug:</label>
				        <input id="slug" name="slug" class="form-control" value="{{$post->slug}}">
				        
				    </div>
				     <div class="form-group">
			      		<label name="image">Update image:</label>
			      		<input type="file" name="image" id="image" >
		      		</div>
				     <div class="form-group">
				        <label name="tags">Tags:</label>
					    <select class="form-control select2-multi" name="tags[]" multiple="multiple">
					        @foreach($tags as $tag)
					        	<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					        @endforeach
				    	</select>
		     		</div>
		     		
		     		<div class="form-group">
				        <label name="category_id">category:</label>
				        <select class="form-control" name="category_id">
				        @foreach($categories as $category)
				        	<option value="{{ $category->id }}">{{ $category->name }}</option>
				        @endforeach
		     		 </div>
   	 		 
				</div>		
				<div class="col-md-4">
					<div class="well">
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
								
								<input type="submit" value="Update" class="btn btn-success btn-block">
							 	<input type="hidden" name="_token" value="{{ Session::token() }}">
	              				
							</div>
							<div class="col-md-6">
								<a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-block">Cancel</a>
							</div>
						</div>
						<div class ="row">
				        <div class "col-md-12">
				    
				        	<a href="{{ route('posts.index') }}" class="btn btn-default btn-block btn-hl-spacing">See all posts</a>
				          </div>
				        </div>	
					</div>
				
				</div>
			</div>
		</form>
    
    </div>
@endsection

<script src="js/select2.min.js" >
</script>
<script type="text/javascript">
	$('.select2-multi').select2();

</script>