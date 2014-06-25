<head>
  <meta charset="utf-8">
  <title>{{ $page_title }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{HTML::style('bootstrap/css/bootstrap.css')}}
  {{HTML::style('css/flat-ui.css')}}
  {{HTML::style('css/font-awesome.min.css')}}
  @if(Request::is('login') || Request::is('user/*'))
    {{HTML::style('css/login-style.css')}}
  @else
    {{HTML::style('css/public-style.css')}}
  @endif
  <link rel="shortcut icon" href="images/favicon.ico">
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>