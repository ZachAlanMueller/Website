<!doctype html>
<html>
  <head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  </head>
  <body>
  <div class="container">
    
    <div id="results"> 
    	@if($results)

		    @foreach ($results as $machine) 

		    {{ $machine->name }} <br>

		    @endforeach
		@else
			Blehg
		
		@endif



     </div>
    
  </div>
  </body>
</html>