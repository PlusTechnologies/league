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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Organization Details</h3>
                        </div>
                        <div class="panel-body">
                            <div class="list-group">
                                <div class="search-result row">
                                    <div class="col-xs-12 col-sm-12 col-md-3">
                                        {{HTML::image($organization->logo, $organization->name, array('class'=>'img-thumbnail','width'=>200));}}
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-7 excerpet">

                                        <h5>{{$organization->name}}</h5>
                                        Location: 
                                        <br>
                                        {{$organization->add1}} <br>
                                        {{$organization->city}}, {{$organization->state}} {{$organization->zip}} <br>
                                        <br>
                                        <small>Created: {{date('d M Y H:i a',strtotime($organization->created_at)) }}</small>


                                        <span class="plus">
                                            <a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-pen"></i></a>
                                        </span>
                                    </div>
                                    <span class="clearfix borda"></span>
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
                        <div class="col-sm-6">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Events</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="list-group">
                                            @foreach ($organization->events as $event)
                                                    <a class="list-group-item" href="{{URL::action('EventoController@show', array($organization->id,$event->id))}}">
                                                        {{ $event->name }}
                                                    </a>
                                            @endforeach
                                    </div>
                                    <a class="btn btn-info btn-embossed" href="{{URL::action('EventoController@create', $organization->id)}}">
                                        New Event
                                    </a>
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