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
            <h3>Built in the cloud for your organization.</h3>
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
<footer>
  <div class="container">
    <div class="row">
      <a class="footer-brand"><div class="logo" style="background-image: url({{ URL::asset('images/league-together-logo.svg'); }})"></div></a>
      <div class="col-md-10 col-md-offset-1">
        <h1 class="text-center">Join Today, It's Free!</h1>
        <p class="text-center">League Together is a team management services build in the cloud centered around: organizations, players and parents. Now you can enjoy the game more and we will handle the rest.</p>
      </div>
    </div>
    <div class="row">
      <section>
        <form id="theForm" class="simform" autocomplete="off">
          <div class="simform-inner">
            <ol class="questions">
              <li>
                <span><label for="q1">What's your favorite movie?</label></span>
                <input id="q1" name="q1" type="text"/>
              </li>
              <li>
                <span><label for="q2">Where do you live?</label></span>
                <input id="q2" name="q2" type="text"/>
              </li>
              <li>
                <span><label for="q3">What time do you go to work?</label></span>
                <input id="q3" name="q3" type="text"/>
              </li>
              <li>
                <span><label for="q4">How do you like your veggies?</label></span>
                <input id="q4" name="q4" type="text"/>
              </li>
              <li>
                <span><label for="q5">What book inspires you?</label></span>
                <input id="q5" name="q5" type="text"/>
              </li>
              <li>
                <span><label for="q6">What's your profession?</label></span>
                <input id="q6" name="q6" type="text"/>
              </li>
            </ol><!-- /questions -->
            <button class="submit" type="submit">Send answers</button>
            <div class="controls">
              <button class="previous"></button>
              <button class="next"></button>
              <div class="progress"></div>
              <span class="number">
                <span class="number-current"></span>
                <span class="number-total"></span>
              </span>
              <span class="error-message"></span>
            </div><!-- / controls -->
          </div><!-- /simform-inner -->
          <span class="final-message"></span>
        </form><!-- /simform -->
      </section>
    </div>
    <div class="row">
      <p class="copyright text-muted small">Copyright &copy; LeagueTogether 2014. All Rights Reserved</p>
    </div>
  </div>
</footer>
@stop
