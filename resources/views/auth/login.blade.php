@extends('main')

@section('title','|Login')

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
    <form method="POSt" action="{{route('login') }} ">
      {{ csrf_field() }}
      {{ method_field('POST') }}
        <div class="row">
          <div class="col-md-8">
           
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
         
          
          
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>     
            </div>  
            <div class="col-md-6">
              
              <BUTTON type="submit" value="Register" class="btn btn-success btn-lg btn-block">Login</BUTTON> 
              <input type="hidden" name="_token" value="{{ Session::token() }}">
                    
            </div>
         <div class="col-md-6">
              
              <p><a href="{{  url('password/reset') }}"> Forget Password</a></p>
                    
            </div>
          </div>
      </div>
    </form>
  </div>

@endsection
