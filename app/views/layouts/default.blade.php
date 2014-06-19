<!DOCTYPE html>
<html lang="en">
@include('includes.header')

@if (Request::is('signup'))
	<body id="page-login" class="index">
		@yield('content')
		@include('includes.footer')
		@yield('script')
	</body>
@else 
	<body id="page-top" class="index">
		@yield('content')
		@include('includes.footer')
		@yield('script')
	</body>
@endif

</html>