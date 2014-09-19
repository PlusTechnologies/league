<head>
  <meta charset="utf-8">
  <title>{{ $page_title }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{HTML::style('bootstrap/css/bootstrap.css')}}
  {{HTML::style('css/bootstrap-select.min.css')}}
  {{HTML::style('css/select2.css')}}
  {{HTML::style('css/select2-bootstrap.css')}}
  {{HTML::style('css/flat-ui.css')}}
  {{HTML::style('css/font-awesome.min.css')}}
  {{HTML::style('css/font-retina.css')}}
  {{HTML::style('css/croppic.css')}}
  {{HTML::style('css/datepicker.css')}}
  
  {{ HTML::style('css/dashboard/redactor.css')}}
  @if(Request::is('login') || Request::is('user/*'))
    {{HTML::style('css/login-style.css')}}
    {{HTML::style('css/public/style.css')}}
  @else
    {{HTML::style('css/public/style.css')}}

  @endif
  <link rel="shortcut icon" href="images/favicon.ico">
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container relative">
        <a class="navbar-brand-center" href="/">
            <div class="logo" style="background-image: url(/images/league-together-logo.svg)"></div>
        </a>
      
        <div class="collapse navbar-collapse" id="navbar-collapse-01">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="/cart">
                <i class="cart retinaicon-finance-001"></i>
                @if(Cart::totalItems() <> 0)
                <span class="navbar-new">{{Cart::totalItems()}}</span>
                @endif
              </a>
            </li>
          </ul>
          @if(!Auth::check())
          <a class="navbar-right btn btn-xs btn-primary nav-btn"href="{{ URL::route('signup') }}">Sign up</a>
          <a class="navbar-right btn btn-xs btn-primary nav-btn"href="{{ URL::route('login') }}">Sign in</a>
          @else
          <a class="navbar-right btn btn-xs btn-primary nav-btn"href="{{ URL::route('logout') }}">Logout</a>
          <a class="navbar-right btn btn-xs btn-primary nav-btn"href="{{ URL::route('dashboard') }}">Open Dashboard</a>
          @endif
        </div>
    </div>
</nav>

