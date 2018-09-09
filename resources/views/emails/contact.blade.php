@extends('main')

@section('title','| Contact')

@section('content')
          <div class="container">
            
            <h1>You have a new contact </h1>
              <div>
                {{ $bodyMessage }}
                <p>Sent via {{ $email  }}</p>
              </div>
          </div>
   @endsection