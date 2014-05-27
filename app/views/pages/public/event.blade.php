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
                                    <pre>{{$event}}</pre>
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

                    @if($event->group_fee > 0)
                        {{ Form::open(array('action' => array('PaymentController@addtocart'),'method' => 'post')) }}
                        {{ Form::hidden('order', 1) }}
                        {{ Form::hidden('team', 1) }}
                        {{ Form::hidden('event', $event->id) }}
                        <button class="btn btn-info">Register Team</button>
                        {{ Form::close() }}
                        <br>
                    @endif
                    {{ Form::open(array('action' => array('PaymentController@addtocart'),'method' => 'post')) }}
                    {{ Form::hidden('order', 1) }}
                    {{ Form::hidden('team', 0) }}
                    {{ Form::hidden('event', $event->id) }}
                    <button class="btn btn-info">Register Player</button>
                    {{ Form::close() }}
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>

<div class="modal fade" id="addevent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add event</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@stop