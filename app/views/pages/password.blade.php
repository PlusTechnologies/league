@extends('layouts.public.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="login-container">
                <div id="login-title">Forgot Password</div>
                <div class="form-box">

                    @if ( Session::get('error') )
                    <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
                    @endif

                    @if ( Session::get('notice') )
                    <div class="alert">{{{ Session::get('notice') }}}</div>
                    @endif
                    {{ Form::open(array('url' => '/user/forgot_password','id'=>'login','method' => 'post')) }}
                    {{Form::text('email', Input::old('email'), array('id'=>'email','class'=>'login-top','placeholder'=>'Email address', 'tabindex'=>'1')) }}
                    <p>
                        <button class="btn btn-info login" type="submit">Reset</button>
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
@stop