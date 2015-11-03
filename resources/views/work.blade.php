<!doctype html>
<html>
  <head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  </head>
  <body>
  <div class="container">
    
    <div id="results"> 
    	@if(Session::has('results'))

		    @foreach (Session::get('results') as $location) 

		    {{ $location->name }} <br>

		    @endforeach

		@endif



     </div>
    
  </div>
  </body>
</html>