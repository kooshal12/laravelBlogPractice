@extends('main')

@section('title','|Forget my Password')

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
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-default">
					Reset Password
				</div>
				<div class="panel-body">
					<form method="POST" action="{{url('password/reset')   }}">
						{{ csrf_field() }}	
						{{ method_field('POST') }}
						<input type="hidden" name="token" value="{{ $token }}">  
						<div class="form-group">
			       			<label name="email">Email Address:</label>
			         		<input id="email" name="email" class="form-control" value="">
			      		</div>
			      		<div class="form-group">
                			<label for="exampleInputPassword1">New Password</label>
              				<input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              			</div>
              			<div class="form-group">
               				<label for="exampleInputPassword1">confirm Password</label>
             			    <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
 			            </div>
			      		
			            <div class="col-md-6">
			            	<BUTTON type="submit" value="ResetPassword" class="btn btn-success btn-block">Reset Password</BUTTON> 
			             	        
          			 	</div>
					</form>			
				</div>			
			</div>
		</div>
	</div>
@endsection