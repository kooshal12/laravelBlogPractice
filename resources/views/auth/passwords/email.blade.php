@extends('main')

@section('title','|Forget my Password')

@section('content')
	<div class = "row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-default">
					Reset Password
				</div>
				@if(session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif
				<div class="panel-body">
					<form method="POST" action="{{url('password/email')  }}">
						{{ csrf_field() }}	
						<div class="form-group">
			       			<label name="email">Email Address:</label>
			         		<input id="email" name="email" class="form-control" >
			      		</div>
			      		
			            <div class="col-md-6">
			            	<BUTTON type="submit" value="ResetPassword" class="btn btn-success btn-block">Reset Password</BUTTON> 
			             	<input type="hidden" name="_token" value="{{ Session::token() }}">          
          			 	</div>
					</form>			
				</div>			
			</div>
		</div>
	</div>
@endsection