@extends('main')

@section('title','|All Categories')

@section('content')
	
<div class="row">
		<div class="col-md-8">
			
			<h1>Categories</h1>
				
			<table class="table">
				<thead>
				    <tr>
					     <th scope="col">#</th>
					     <th scope="col">Name</th>
					  
					     <th scope="col"></th>
				    </tr>
				</thead>
				<tbody>
					@foreach($categories as $categorie)
  		
					    <tr>
					   		<th>{{ $categorie->id }}</th>
					    	<th>{{ $categorie->name }}</th>
					    </tr>

    				@endforeach    
				</tbody>
			</table>
		</div>

		<div class="col-md-3">
			<form method="POST" action="{{  route('categories.store') }}">
					<h2>New Category</h2>
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