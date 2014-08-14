@extends('layouts.public.default')
@section('content')
<div class="container wrapper">
    <div class="row">
        <div class="content-wrap">
            <div class="col-sm-10 col-sm-offset-1">
                <h3 class="">Signing up for League Together is fast and free—no commitments or long-term contracts.</h3>
                <br>
                <div class="col-sm-12 clearfix">
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
                        <h3>What is your role?</h3>
                        <hr>
                        <div class="row text-center">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <a href="{{URL::action('UsersController@family')}}">
                                        <div class="signup-icon"><i class="retinaicon-communication-006 middle-icon"></i></div>
                                        <label>Parent/Family or Legal Guardian</label>
                                    </a>
                                    <p>Parent accounts allows you to manage players, pay for events, team fees and get annoucements from the team administrator.</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <a href="{{URL::action('UsersController@player')}}">
                                        <div class="signup-icon"><i class="retinaicon-essentials-114 middle-icon"></i></div>
                                        <label>Team Player</label>
                                    </a>
                                    <p>Player accounts allows to pay for events, join teams and get annoucements from your teams.</p>
                                    
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                     <a href="{{URL::action('UsersController@club')}}">
                                        <div class="signup-icon"><i class="retinaicon-business-012 middle-icon"></i></div>
                                        <label>Team/Club Administrator</label>
                                    </a>
                                    <p>Manage team registrations, accept payments online, create announcements, roster and accounting.</p>
                                </div>
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="push"></div>
</div>
</div>
@stop