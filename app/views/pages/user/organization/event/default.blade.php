@extends('layouts.dashboard.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="row">
                <div class="col-sm-12">
                    <h5>
                        Dashboard

                        @if(Auth::check())
                        <a class="btn btn-lg pull-right btn-primary" href="{{ URL::route('logout') }}">Logout</a>
                        @endif

                    </h5>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
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
                                            <strong>Fee: </strong> $ {{money_format('%i',$event->fee)  }}
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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        Registered users for event
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($participants as $participant)
                                            <tr>
                                                <td>{{ date("M d, Y",strtotime($participant->created_at)) }}</td>
                                                <td>{{$participant->firstname }} {{$participant->lastname}}</td>
                                                <td>{{money_format('%.2n',$participant->total)  }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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