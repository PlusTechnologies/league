<!DOCTYPE html>
<html lang="en"  >
<head>
  <meta charset="utf-8">
  <title>Maintenance</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{HTML::style('bootstrap/css/bootstrap.css')}}
  {{HTML::style('css/flat-ui.css')}}
  {{HTML::style('css/font-awesome.min.css')}}
  {{HTML::style('css/font-retina.css')}}
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
          </ul>
        </div>
    </div>
</nav>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="login-container">
        <div id="login-title"></div>
        <div class="form-box">
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div id="login-help">
        <div class="text-center">
        <br>
        <br>
       We are currently performing scheduled maintenance on our site.
       </div>
     </div>
   </div>
 </div>
</div>