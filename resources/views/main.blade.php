<!doctype html>
<html lang="en">
  @include('partials._head')


  <body>
    
    @include('partials._navigation')

    <div class = "container">
    	

      @yield('content')
    
    </div>

   @include('partials._javascript')

  </body>
  @include('partials._footer')
</html>