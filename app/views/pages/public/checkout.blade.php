@extends('layouts.public.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="row">
                <div class="col-sm-12">

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <h4>Public Event view</h4>
                    @if(Session::has('message'))
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="alert alert-warning alert-dismissable">
                                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                                    {{ Session::get('message') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="media-heading">User Info</h6>
                            <div class="media">
                                {{HTML::image($user->avatar, $user->firstname, array('class'=>'img-thumbnail pull-right','width'=>95));}}
                                <div class="media-body">
                                    <p>
                                        <small>
                                            Name: {{$user->firstname}} {{$user->lastname}}
                                            <br>
                                            Email: {{$user->email}}
                                            <br>
                                            Mobile: {{$user->mobile}}
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <span >{{HTML::image($event->organization->logo, $event->organization->name, array('class'=>'img-thumbnail','width'=>35));}}</span>
                                        <span class="text-right">{{$event->organization->name}}</span>
                                        | Event
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="list-group">
                                        <h2>{{$event->name}}</h2>
                                        <p><strong>Location: </strong> {{$event->location}} <br>
                                            <strong>Date: </strong> {{ date("M d, Y",strtotime($event->start)) }} <br>
                                            <strong>Player Fee: </strong> $ {{money_format('%i',$event->fee)  }}
                                            @if($event->group_fee > 0)
                                            <br>   
                                            <strong>Team Fee: </strong> $ {{money_format('%i',$event->group_fee)}}</p>
                                            @else
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <p>Open registration date: {{ date("M d, Y",strtotime($event->open)) }}</p>
                    {{ Form::open(array('action' => array('PaymentController@cart'),'method' => 'post')) }}
                    {{ Form::hidden('event', $event->id) }}
                    <button class="btn btn-info">Sign up for Event</button>
                    {{ Form::close() }}
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
@stop