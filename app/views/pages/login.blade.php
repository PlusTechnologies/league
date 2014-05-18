@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <hr>
            <div class="col-sm-6 col-sm-offset-3">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="">Login <small>It's free and always will be.</small></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
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
                    <hr class="colorgraph">
                    <div class="col-lg-12">
                        <div class="form-group">
                            {{Form::email('email', '', array('id'=>'email','class'=>'form-control input-lg','placeholder'=>'Email Address', 'tabindex'=>'1')) }}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">

                            {{Form::password('password', array('id'=>'password','class'=>'form-control input-lg','placeholder'=>'Password', 'tabindex'=>'2')) }}
                        </div>
                        <div class="form-group">
                            <label for="remember" class="checkbox">{{{ Lang::get('confide::confide.login.remember') }}}
                                <input type="hidden" name="remember" value="0">
                                <input tabindex="3" type="checkbox" name="remember" id="remember" value="1" data-toggle="checkbox">
                            </label>
                            <label for="password">
                                    <a href="{{{ (Confide::checkAction('UserController@forgot_password')) ?: 'forgot' }}}">
                                        Forgot password
                                    </a>
                            </label>

                        </div>
                    </div>

                    <div class="col-sm-12">
                       <button class="btn btn-primary btn-block" id="login">Login</button>
                   </div>
                   {{ Form::close() }}
               </div>
           </div>
       </div>
       <div class="col-sm-10 col-sm-offset-1">
        <hr>
    </div>
</div>
</div>
@stop