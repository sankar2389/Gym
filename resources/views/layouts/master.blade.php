<!DOCTYPE html>
<html>
	
 @include('include.head')
	
	<body> 
		
	 @section('htmlheader')
  		@include('include.header')
  	 @show
       
	
	 @yield('main-content')


	 @include('include.footer')
	
 	</body>
</html>
