@extends('main')

@section('title','|Create New Post')

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

	<div class = "row">
		<div class="col-md-8 col-md-ofset-2">
			<h1>Create New Post</h1>
			<hr>	
			<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
				 {{ csrf_field() }}
			      {{ method_field('POST') }}
			      <div class="form-group">
			        <label name="title">Title:</label>
			        <input id="title" name="title" class="form-control">
			      </div>

		    
			      <div class="form-group">
			        <label name="slug">Slug:</label>
			        <input id="slug" name="slug" class="form-control">
			       
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
			  			</select>
			       </div>
			      <div class="form-group">
			      		<label name="image">Upload image:</label>
			      		<input type="file" name="image" id="image">
			      </div>
			      <div class="form-group">
			        <label name="body">Body:</label>
			        <textarea id="body" name="body" h="50" rows="5" class="form-control"></textarea>
			      </div>
		      
			      <div class="col-md-8">
			      	<input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block">
			      	<input type="hidden" name="_token" value="{{ Session::token() }}">
			  	</div>		<br>
			  	<div class="col-md-8">
					<a href="{{ route('posts.index') }}" class="btn btn-danger btn-block">Cancel</a>
				   </div>
		    </form>		
		</div>
		
	</div>

@endsection


<script src="js/select2.min.js" >

</script>

<script type="text/javascript">
	$('.select2-multi').select2();
</script>