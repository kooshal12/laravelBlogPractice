@extends('main')

@section('title','|Register')


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
	<div class="container">
		<hr>	
		<form method="POSt" action="{{route('register') }} ">
			{{ csrf_field() }}
			{{ method_field('POST') }}
      		<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<label for="FullName">Email Full Name</label>
					    <input name="name" type="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Full Name">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Email address</label>
					    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
					</div>
					<div class="form-group">
					    <label for="exampleInputPassword1">Password</label>
					    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				    </div>
				    <div class="form-group">
					    <label for="exampleInputPassword1">Confirm Password</label>
					    <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				    </div>
				
					<div class="col-md-6">
						
						<BUTTON type="submit" value="Register" class="btn btn-success  btn-block">Register</BUTTON> 
					 	<input type="hidden" name="_token" value="{{ Session::token() }}">
          				
					</div>
					<div class="col-md-6">
						<a href="#" class="btn btn-danger btn-block">Cancel</a>
					</div>
				</div>
			</div>
		</form>
    </div>

@endsection
