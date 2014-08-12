<!DOCTYPE html>
<html lang="en"  >
@include('includes.public.header')
@if(Request::is('checkout/success'))
<body class="receipt-body">
@else
<body>
@endif
  	@yield('content')
  	@include('includes.public.footer')
  	@yield('script')
</body>
</html>