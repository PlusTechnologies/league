<head>
  <meta charset="utf-8">
  <title>{{ $page_title }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{HTML::style('bootstrap/css/bootstrap.css')}}
<!--   {{HTML::style('css/flat-ui.css')}} -->
  {{HTML::style('css/font-awesome.min.css')}}
  {{HTML::style('css/morris.css')}}
  {{HTML::style('css/font-retina.css')}}
  {{HTML::style('css/croppic.css')}}
  @if(Route::currentRouteName() == "dashboard.club.create" ||
  Route::currentRouteName() == "dashboard.club.event.create"
  )
  {{ HTML::style('css/dashboard/redactor.css')}}
  @endif
  {{HTML::style('css/dashboard/style.css')}}
  {{HTML::style('css/dashboard/style-header.css')}}

  <link rel="shortcut icon" href="images/favicon.ico">
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>