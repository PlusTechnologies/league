@extends('layouts.public.default')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="login-container">
        <div id="login-title">welcome</div>
        @if($errors->has())
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <div class="alert alert-warning alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <ul>
                  @foreach ($errors->all() as $error) 
                  <li>{{$error}}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
        @endif
        <div class="form-box">
          {{Form::open(array('url' => 'users/login','id'=>'login','method' => 'post')) }}
          @if(Session::has('error'))
          {{Form::text('email', '', array('id'=>'email','class'=>'login-error-top','placeholder'=>'Email address', 'tabindex'=>'1'))}}
          {{Form::password('password', array('id'=>'password','class'=>'login-error-bottom','placeholder'=>'Password', 'tabindex'=>'2')) }}
          @else
          {{Form::text('email', '', array('id'=>'email','class'=>'login-top','placeholder'=>'Email address', 'tabindex'=>'1')) }}
          {{Form::password('password', array('id'=>'password','class'=>'login-bottom','placeholder'=>'Password', 'tabindex'=>'2')) }}
          @endif       
          <p>
            <button class="btn btn-info login" type="submit">Sign In</button>
            <a class="pass-help" href="{{{ URL::to('/users/forgot') }}}">
              Password help?
            </a>
          </p>
          {{Form::close()}}
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
@stop