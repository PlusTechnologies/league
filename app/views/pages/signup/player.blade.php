@extends('layouts.public.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="content-wrap">
            <div class="col-sm-10 col-sm-offset-1">
                <h3 class="">Signing up for League Together is fast and free—no commitments or long-term contracts.</h3>
                <br>
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

                        <h3>Let's get started</h3>
                        <hr>
                        <div class="row">

                            <div class="col-xs-12 col-sm-4 col-md-4">

                                <div class="form-group">
                                    <label>First Name</label>
                                    {{Form::text('firstname', '', array('id'=>'firstname','class'=>'form-control','placeholder'=>'First Name','tabindex'=>'2')) }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    {{Form::text('lastname', '', array('id'=>'lastname','class'=>'form-control','placeholder'=>'Last Name', 'tabindex'=>'3')) }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label>mobile</label>
                                    {{Form::text('mobile', '', array('id'=>'mobile','class'=>'form-control','placeholder'=>'Mobile #', 'tabindex'=>'5')) }}                                
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-8">
                                <div class="form-group">
                                    <label>Email</label>
                                    {{Form::email('email', '', array('id'=>'email','class'=>'form-control','placeholder'=>'Email Address', 'tabindex'=>'4')) }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label>Password</label>
                                    {{Form::password('password', array('id'=>'password','class'=>'form-control','placeholder'=>'Password', 'tabindex'=>'6')) }}
                                </div>
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    {{Form::password('password_confirmation',array('id'=>'password_confirmation','class'=>'form-control','placeholder'=>'Confirm Password', 'tabindex'=>'7')) }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label>Account Type</label>
                                    {{Form::select('type', array('1' => 'Club', '2' => 'Player'), '1', array('class'=>'select-block','tabindex'=>'1') ) }}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label>Select your profile picture.</label>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <span class="btn btn-info btn-file btn-sm btn-block">                        
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
                                </div>
                            </div>
                        </div>
                        <hr>
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
                            <p>By clicking <strong>"I Agree"</strong>, you accept the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.</p>
                        </div>
                    </div>
                    <br class="colorgraph">
                    <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <button class="btn btn-primary  btn-sm btn-block" id="register">Create Account</button>
                            </div>
                             <div class="col-xs-12 col-sm-4 col-md-4">
                                <a href="{{ URL::route('login') }}" class="btn btn-info btn-sm btn-block" >Sign In</a>
                             </div>                            
                    </div>
                    {{ Form::close() }}
                    <div class="row">
                        <div class="col-sm-12">
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop