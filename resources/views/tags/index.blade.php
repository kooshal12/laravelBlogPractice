@extends('main')

@section('title','|All Tags')

@section('content')
	
	<div class="row">
		<div class="col-md-8">
			
			<h1>Tags</h1>
				
			<table class="table">
				<thead>
				    <tr>
					     <th scope="col">#</th>
					     <th scope="col">Name</th>
					  
					     <th scope="col"></th>
				    </tr>
				</thead>
				<tbody>
					@foreach($tags as $tag)
  		
					    <tr>
					   		<th>{{ $tag->id }}</th>
					    	<th><a href="{{ route('tags.show',$tag->id) }} ">{{ $tag->name }}</a></th>
					    </tr>

    				@endforeach   
				</tbody>
			</table>
		</div>

		<div class="col-md-3">
			<form method="POST" action="{{  route('tags.store') }}">
				<h2>New Tag</h2>
				{{ csrf_field() }}
		      	
			    <div class="form-group">
			        <label name="name">Name:</label>
			        <input id="name" name="name" class="form-control">
			   </div>
			   <div>
			    	<button type="submit" class="btn btn-primary btn-block">Submit</button>
	      		</div>	
			</form>	
		</div>
	</div>


@endsection