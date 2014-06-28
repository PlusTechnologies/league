@extends('layouts.public.default')
@section('content')
<nav class="navbar navbar-default navbar-fixed-top">
        <a class="navbar-brand-center" href="#page-top">
          <div class="logo" style="background-image: url(http://leaguetogether.dev/images/league-together-logo.svg)"></div>
        </a> 
</nav>


<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="login-container">
        <div id="login-title">welcome</div>
        <div class="form-box">
          {{ Form::open(array('url' => 'user/login','id'=>'login','method' => 'post')) }}
          @if(Session::has('error'))
          {{Form::text('email', '', array('id'=>'email','class'=>'login-error-top','placeholder'=>'Email address', 'tabindex'=>'1'))}}
          {{Form::password('password', array('id'=>'password','class'=>'login-error-bottom','placeholder'=>'Password', 'tabindex'=>'2')) }}
          @else
          {{Form::text('text', '', array('id'=>'email','class'=>'login-top','placeholder'=>'Email address', 'tabindex'=>'1')) }}
          {{Form::password('password', array('id'=>'password','class'=>'login-bottom','placeholder'=>'Password', 'tabindex'=>'2')) }}
          @endif       
          <p>
            <button class="btn btn-info login" type="submit">Sign In</button>
            <a class="pass-help" href="{{{ (Confide::checkAction('UserController@forgot_password')) ?: 'forgot' }}}">
              Password help?
            </a>
          </p>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div id="login-help">
        <div class="text-center">

         Don’t have an account? 
         <a href="{{ URL::route('signup') }}">
           Sign up 
         </a>today.

       </div>
     </div>
   </div>
 </div>
</div>



<!-- <div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="row">
                    <div class="col-sm-12" id="head-body">
                     
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-sm-offset-3" id="main-body">
                <div class="row">
                    <div class="col-sm-12">
                        <br>
                        <p class="text-center">
                            Welcome
                         <hr class="carved">
                        </p>
                        <div class="form-group">
                            @if(Session::has('notice'))
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ Session::get('notice') }}
                            </div>
                            @endif
                            @if(Session::has('error'))
                            <div class="alert alert-error alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ Session::get('error') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    {{ Form::open(array('url' => 'user/login','id'=>'login','method' => 'post')) }}
                    <div class="col-lg-12">
                        <div class="form-group">
                            {{Form::email('email', '', array('id'=>'email','class'=>'form-control input-lg','placeholder'=>'Email Address', 'tabindex'=>'1')) }}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">

                            {{Form::password('password', array('id'=>'password','class'=>'form-control input-lg','placeholder'=>'Password', 'tabindex'=>'2')) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn btn-primary btn-block btn-embossed" id="login">Login to your account</button>
                    </div>
                    
                </div>
            </div>

            <div id="login-help" class="col-sm-6 col-sm-offset-3">
                <div class="col-sm-6">
                    <label for="remember" class="checkbox">{{{ Lang::get('confide::confide.login.remember') }}}
                        <input type="hidden" name="remember" value="0">
                        <input tabindex="3" type="checkbox" name="remember" id="remember" value="1" data-toggle="checkbox">
                    </label>
                </div>
                <div class="col-sm-6 text-right">
                    <label for="password">
                        <a href="{{{ (Confide::checkAction('UserController@forgot_password')) ?: 'forgot' }}}">
                            Need help?
                        </a>
                    </label>
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <div class="col-sm-10 col-sm-offset-1">
        </div>
    </div>
  </div> -->
  @stop