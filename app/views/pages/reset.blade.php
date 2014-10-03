@extends('layouts.public.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="login-container">
                <div id="login-title">welcome</div>
                <div class="form-box">

                    <form method="POST" action="{{{ (Confide::checkAction('UserController@do_reset_password'))    ?: URL::to('/user/reset') }}}" accept-charset="UTF-8">
                        <input type="hidden" name="token" value="{{{ $token }}}">
                        <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

                        <div class="form-group">
                            <label for="password">{{{ Lang::get('confide::confide.password') }}}</label>
                            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>
                            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
                        </div>

                        @if ( Session::get('error') )
                        <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
                        @endif

                        @if ( Session::get('notice') )
                        <div class="alert">{{{ Session::get('notice') }}}</div>
                        @endif

                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.forgot.submit') }}}</button>
                        </div>
                    </form>



                    @if ( Session::get('error') )
                    <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
                    @endif

                    @if ( Session::get('notice') )
                    <div class="alert">{{{ Session::get('notice') }}}</div>
                    @endif

                    {{ Form::open(array('url' => '/user/reset_password','id'=>'login','method' => 'post')) }}
                    <input type="hidden" name="token" value="{{{ $token }}}">

                    {{Form::text('password', '', array('id'=>'email','class'=>'login-top','placeholder'=>'Password', 'tabindex'=>'1')) }}
                    {{Form::password('password_confirmation', array('id'=>'password','class'=>'login-bottom','placeholder'=>'Confirm password', 'tabindex'=>'2')) }}


                    <p>
                        <button class="btn btn-info login" type="submit">Continue</button>
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