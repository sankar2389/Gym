<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('admin.layouts.partials.htmlheader')
@show

  <body class="hold-transition login-page">
	  
	   @yield('content')
	  
@section('scripts')
    @include('admin.layouts.partials.scripts')
@show

</body>
</html>
