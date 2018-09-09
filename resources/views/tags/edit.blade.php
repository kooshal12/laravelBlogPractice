@extends('main')

@section('title','|Edit Tags')

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
	
	<form method="POST" action="{{route('tags.update', $tags->id) }} ">
			     {{ csrf_field() }}
			      {{ method_field('PUT') }}
      		<div class="row">
				<div class="col-md-8">
			     <div class="form-group">
				        <label name="name">Name:</label>
				        <input id="name" name="name" class="form-control" value={{ $tags->name }}>
				   </div>
				</div>

				<div class="col-md-4">
					<div class="well">
						<div class="row">
							<div class="col-md-6">
								<input type="submit" value="Update" class="btn btn-success btn-block">
							 	<input type="hidden" name="_token" value="{{ Session::token() }}">
							</div>

							<div class="col-md-6">
								<a href="{{ route('tags.show', $tags->id) }}" class="btn btn-danger btn-block">Cancel</a>
							</div>

						</div>
						
					</div>
				
				</div>
			</div>
		</form>
    

@endsection