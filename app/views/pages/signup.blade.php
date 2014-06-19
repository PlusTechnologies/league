@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <hr>
            <h3 class="">New Account <small>It's free and always will be.</small></h3>
            <div class="col-sm-8 clearfix">
                <div class="row">
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
                    
                    {{ Form::open(array('url' => 'account','id'=>'new_account','method' => 'post', 'files'=>true)) }}

                    <h6>User Account</h6>
                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                {{Form::text('firstname', '', array('id'=>'firstname','class'=>'form-control input-sm','placeholder'=>'First Name','tabindex'=>'2')) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                {{Form::text('lastname', '', array('id'=>'lastname','class'=>'form-control input-sm','placeholder'=>'Last Name', 'tabindex'=>'3')) }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                {{Form::email('email', '', array('id'=>'email','class'=>'form-control input-sm','placeholder'=>'Email Address', 'tabindex'=>'4')) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                {{Form::text('mobile', '', array('id'=>'mobile','class'=>'form-control input-sm','placeholder'=>'Mobile #', 'tabindex'=>'5')) }}                                
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                {{Form::password('password', array('id'=>'password','class'=>'form-control input-sm','placeholder'=>'Password', 'tabindex'=>'6')) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                {{Form::password('password_confirmation',array('id'=>'password_confirmation','class'=>'form-control input-sm','placeholder'=>'Confirm Password', 'tabindex'=>'7')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <span class="btn btn-primary btn-file btn-xs">                        
                                <span class="fileinput-new">
                                    <span class="fui-upload"></span>  
                                    Attach File
                                </span>
                                <span class="fileinput-exists">
                                    <span class="fui-gear"></span>  
                                    Change
                                </span>
                                <input type="file" name="avatar">
                            </span>
                            <span class="fileinput-filename"></span>
                            <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×
                            </a>
                        </div>
                        <small><span class="text-muted">Select your profile picture.</span></small>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-sm-3 col-md-3">
                            <span class="button-checkbox">
                                <button type="button" class="btn btn-xs" data-color="info" tabindex="7">
                                    I Agree
                                </button>
                                {{Form::checkbox('agreement', '1',false, array('id'=>'agreement','class'=>'hidden')) }}
                            </span>
                        </div>
                        <div class="col-xs-8 col-sm-9 col-md-9">
                            <small>By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.</small>
                        </div>
                    </div>
                    <br class="colorgraph">
                    <div class="row">
                      <div class="col-sm-12">
                        <button class="btn btn-primary  btn-sm" id="register">Register</button>
                        <a href="{{ URL::route('login') }}" class="btn btn-info  btn-sm" >Sign In</a>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <div class="col-sm-10 col-sm-offset-1">
    </div>
</div>
</div>
</div>
@stop