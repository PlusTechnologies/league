@extends('layouts.default')
@section('content')
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#page-top">
            <div class="logo" style="background-image: url({{ URL::asset('images/league-together-logo.svg'); }})"></div>
          </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse-01">

            @if(!Auth::check())
              <a class="navbar-right btn btn-xs btn-primary nav-btn"href="{{ URL::route('signup') }}">Sign up</a> 
              <a class="navbar-right btn btn-xs btn-primary nav-btn"href="{{ URL::route('login') }}">Sign in</a> 
            @else
              <a class="navbar-right btn btn-xs btn-primary nav-btn"href="{{ URL::route('logout') }}">Logout</a>
              <a class="navbar-right btn btn-xs btn-primary nav-btn"href="{{ URL::route('dashboard') }}">Open Dashboard</a>
            @endif
          <ul class="nav navbar-nav">
            <li class="hidden">
              <a href="#page-top"></a>
            </li>
            <li class="page-scroll">
              <a href="#camps-tryouts">Registration</a>
            </li>
            <li class="page-scroll">
              <a href="#management">Management</a>
            </li>
            <li class="page-scroll">
              <a href="#communications">Communications</a>
            </li>
            <li class="page-scroll">
              <a href="#accounting">Accounting</a>
            </li>
<!--             <li class="page-scroll">
              <a href="#works">How it works</a>
            </li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>
<header>
  <div class="intro-header" style="background-image: url({{ URL::asset('images/landing-background.jpg'); }});  background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(52, 73, 94, 0.5)), to(rgba(52, 73, 94, 0.5))), url({{ URL::asset('images/landing-background.jpg'); }}); background-image: -webkit-linear-gradient(top, rgba(52, 73, 94, 0.5), rgba(52, 73, 94, 0.5)), url({{ URL::asset('images/landing-background.jpg'); }}); background-image: -moz-linear-gradient(top, rgba(52, 73, 94, 0.5), rgba(52, 73, 94, 0.5)), url({{ URL::asset('images/landing-background.jpg'); }}); background-image: -ms-linear-gradient(top, rgba(52, 73, 94, 0.5), rgba(52, 73, 94, 0.5)), url({{ URL::asset('images/landing-background.jpg'); }}); background-image: -o-linear-gradient(top, rgba(52, 73, 94, 0.5), rgba(52, 73, 94, 0.5)), url({{ URL::asset('images/landing-background.jpg'); }}); background-image: linear-gradient(to bottom, rgba(52, 73, 94, 0.5), rgba(52, 73, 94, 0.5)), url({{ URL::asset('images/landing-background.jpg'); }});">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="intro-message">
            <h1>All-in-one Sport Platform</h1>
            <h3>Built in the cloud for your club.</h3>
            <!-- <p><small>Enjoy the game more and</small> <strong>we’ll handle the rest!</strong></p> -->
            <hr class="intro-divider">
<!-- <ul class="list-inline intro-social-buttons">
@if(!Auth::check())
<li><a href="{{ URL::route('signup') }}" class="btn btn-primary"><span class="network-name">Signup</span></a>
</li>
@endif
</ul> -->
</div>
</div>
</div>
</div>
</div>
</header>
<section id="camps-tryouts">
  <div class="content-section-a">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="col-lg-5 col-sm-6">
          <hr class="section-heading-spacer">
          <div class="clearfix"></div>
          <h2 class="section-heading">Camps & Tryouts</h2>
          <p class="lead">Never in all their <a target="_blank" href="#">history have men</a> been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe.</p>
        </div>
        <div class="col-lg-5 col-lg-offset-2 col-sm-6">
          <div class="section-img" style="background-image: url({{ URL::asset('images/landing-section-1.png'); }})"></div>
        </div>
        </div>
        
      </div>
    </div>
  </div>
</section>
<section id="management">
  <div class="content-section-b">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
          <hr class="section-heading-spacer">
          <div class="clearfix"></div>
          <h2 class="section-heading">Management</h2>
          <p class="lead">Never in all their <a target="_blank" href="#">history have men</a> been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe.</p>
        </div>
        <div class="col-lg-5 col-sm-pull-6  col-sm-6">
          <div class="section-img" style="background-image: url({{ URL::asset('images/landing-section-2.png'); }})"></div>
        </div>
        </div>
        
      </div>
    </div>
  </div>
</section>
<section id="communications">
  <div class="content-section-a">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="col-lg-5 col-sm-6">
          <hr class="section-heading-spacer">
          <div class="clearfix"></div>
          <h2 class="section-heading">Communications</h2>
          <p class="lead">Never in all their <a target="_blank" href="#">history have men</a> been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe.</p>
        </div>
        <div class="col-lg-5 col-lg-offset-2 col-sm-6">
          <div class="section-img" style="background-image: url({{ URL::asset('images/landing-section-3.png'); }})"></div>
        </div>
        </div>
        
      </div>
    </div>
  </div>
</section>
<section id="accounting">
  <div class="content-section-b">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
          <hr class="section-heading-spacer">
          <div class="clearfix"></div>
          <h2 class="section-heading">Accounting</h2>
          <p class="lead">Never in all their <a target="_blank" href="#">history have men</a> been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe.</p>
        </div>
        <div class="col-lg-5 col-sm-pull-6  col-sm-6">
          <div class="section-img" style="background-image: url({{ URL::asset('images/landing-section-4.png'); }})"></div>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop
