@extends('layouts.dashboard.default')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12 app-frame">
      <div class="row ">
        <div class="col-sm-6 app-title app-event-title ">
          <div class="image">
            <i class="retinaicon-essentials-126"></i>
            <div class="div_month">
              <span class="span_day">{{ date("l",strtotime($event->start)) }}</span><br>
              <span class="span_date">{{ date("d",strtotime($event->start)) }}  {{ date("F",strtotime($event->start)) }}</span>
            </div>
          </div>
          <div class="event-info">
            <p>
              <h2>{{$event->name}}</h2>
            </p>
            <p>
              <span class="event-details">Player Price:</span>{{money_format('%.2n',$event->fee)  }}
            </p>
            <p>
              <span class="event-details">Group Price:</span> {{money_format('%.2n',$event->group_fee)}}
            </p>
            <p>
              <span class="event-details">Open Registration:</span> {{ date("F j, Y",strtotime($event->open)) }}
            </p>
            <p>
              <span class="event-details">Close Registration:</span> {{ date("F j, Y",strtotime($event->close)) }}
            </p>
          </div>
          <h2 class="home-title">Participants</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title ">
                <div class="row">
                  <div class = "col-md-12">Player
                    <a class="pull-right" href="{{ URL::action('EventoController@create', $organization->id) }}">
                      <i class="fa fa-plus"></i> Add New
                    </a>
                  </div>
                </div> 
              </h3>
            </div>
            <div class="table-responsive">
              <table class="table table-general">
                <thead>
                  <tr>
                    <th>
                    </th>
                    <th>Name
                    </th>
                    <th>Mobile
                    </th>
                    <th>Receipt
                    </th>
                    <th>Registration Date
                    </th>
                    <th>
                    </th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($participants as $participant)
                  <tr>
                    <td class="col-md-1">
                      <img width=50 height=50 src="{{$participant->avatar}}">
                    </td>
                    <td class="col-md-2">
                      {{$participant->firstname}} {{$participant->lastname}}
                    </td>
                    <td class="">
                      {{$participant->mobile}}
                    </td>
                    <td class="">
                      {{$participant->transaction}}
                    </td>
                    <td class="">
                      {{date("F j, Y g:i a",strtotime($participant->created_at)) }}
                    </td>
                    <td class="text-right">
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
  </div>
</div>
@stop