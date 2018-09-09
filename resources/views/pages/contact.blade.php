@extends('main')

@section('title','| Contact')

@section('content')
          <div class="container">
              <form action="{{ url('contact') }}" method="POST" class="form-control">
                {{ csrf_field() }}
              <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              </div>
            
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Message</label>
                <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>

                <button class="btn btn-primary" type="submit">Submit form</button>
            </form>
            

   @endsection