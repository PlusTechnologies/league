@extends('layouts.dashboard.default')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12 app-frame">
      <div class="row ">
        <div class="col-sm-12 app-title">
          <div class="image"><i class="retinaicon-essentials-126"></i></div>
          <h2 class="text-center">Events</h2>
          <p class="text-center"><small >Create events and keep track of registration.</small> </p>
          <a class="btn btn-primary btn-sm" href="{{ URL::action('EventoController@create', $organization->id) }}"> Create new event</a>
          <h2 class="home-title">Overview</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title ">
                <div class="row">
                  <div class = "col-md-12">Camps
                    <a class="pull-right" href="{{ URL::action('EventoController@create', $organization->id) }}">
                      <i class="fa fa-plus"></i> Create New
                    </a>
                  </div>
                </div> 
              </h3>
            </div>
            <div class="table-responsive">
              <table class="table table-general">
                <thead>
                  <tr>
                    <th>Date
                    </th>
                    <th>Event
                    </th>
                    <th>Status
                    </th>
                    <th>Sales
                    </th>
                    <th>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($camps as $event)
                  <tr>
                    <td class="col-md-2">
                      {{ date("M/d",strtotime($event->start)) }} to {{date('M/d',strtotime($event->end))}} 
                    </td>
                    <td class="col-md-3">
                      <a href="/public/event/{{$event->id}}">{{$event->name}}</a>
                    </td>
                    <td class="">
                     {{$event->status}}
                    </td>
                    <td class="">
                      {{money_format('%.2n',$event->total)  }}
                    </td>
                    <td class="text-right" >
                      <a class="btn btn-xs btn-primary" href="{{ URL::action('EventoController@show',array($organization->id,$event->id)) }}" role="button">
                        Open
                      </a>
                      <button class="btn btn-xs btn-info " type="submit"><i class="fa fa-files-o"></i></button>
                      <button class="btn btn-xs btn-danger " type="submit"><i class="fa fa-trash-o"></i></button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title ">
                <div class="row">
                  <div class = "col-md-12">Tryouts
                    <a class="pull-right" href="{{ URL::action('EventoController@create', $organization->id) }}">
                      <i class="fa fa-plus"></i> Create New
                    </a>
                  </div>
                </div> 
              </h3>
            </div>
            <div class="table-responsive">
              <table class="table table-general">
                <thead>
                  <tr>
                    <th>Date
                    </th>
                    <th>Event
                    </th>
                    <th>Status
                    </th>
                    <th>Sales
                    </th>
                    <th>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($tryouts as $event)
                  <tr>
                    <td class="col-md-2">
                      {{ date("M/d",strtotime($event->start)) }} to {{date('M/d',strtotime($event->end))}} 
                    </td>
                    <td class="col-md-3">
                      <a href="/public/event/{{$event->id}}">{{$event->name}}</a>
                    </td>
                    <td class="">
                      {{$event->status}}
                    </td>
                    <td class="">
                      {{money_format('%.2n',$event->total)  }}
                    </td>
                    <td class="text-right" >
                      <a class="btn btn-xs btn-primary" href="{{ URL::action('EventoController@show',array($organization->id,$event->id)) }}" role="button">
                        Open
                      </a>
                      <button class="btn btn-xs btn-info " type="submit"><i class="fa fa-files-o"></i></button>
                      <button class="btn btn-xs btn-danger " type="submit"><i class="fa fa-trash-o"></i></button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12"><br></div>
    </div>
  </div>
</div>
@stop