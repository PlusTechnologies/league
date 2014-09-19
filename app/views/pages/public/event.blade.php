@extends('layouts.public.default')
@section('content')
<div class="container">
  <div class="maintitle">
    <h4 class="text-center">Public Event</h4>
    <span class="border"></span>
  </div>
  <div class="row">
    <div class="col-sm-12 ">
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
  <div class="row">
    <div class="col-lg-10 col-lg-offset-1">
      <div class="col-sm-4 col-price col-desc">
        <div class="product-actions">
          <div class="pricing">
            <h3 class="text-center">${{money_format('%i',$event->fee)  }}</h3>
          </div>
          {{ Form::open(array('action' => array('PaymentController@addtocart'),'method' => 'post')) }}
          {{ Form::hidden('order', 1) }}
          {{ Form::hidden('team', 0) }}
          {{ Form::hidden('qty', 1) }}
          {{ Form::hidden('event', $event->id) }}
          @if($valid)
          <button class="btn btn-block btn-primary">Register Player</button>
          @else
          <button class="btn btn-block btn-primary disabled" disable="disable">Register closed</button>
          @endif
          {{ Form::close() }}
        </div>
        <h3 class="text-right"><span class="retinaicon-essentials-102"></span></h3>
        <h4 class="text-right">{{$event->name}}</h4>
        <div class="text-right">
          {{$event->description}}
        </div>
      </div>
      <div class="col-sm-4 col-event text-center">
        {{HTML::image($event->club->logo, $event->club->name, array('class'=>'','width'=>200));}}
        <h3>{{$event->club->name}}</h3>
        <p>Open registration date: {{ date("M d, Y",strtotime($event->open)) }}</p>
      </div>
      <div class="col-sm-4 col-price">
        <div class="product-actions">
          <div class="image-head">
          </div>
          @if($event->group_fee > 0)
          <div class="pricing"><h3 class="text-center">${{money_format('%i',$event->group_fee)}}</h3></div>
          @else
          @endif
          @if($event->group_fee > 0)
          {{ Form::open(array('action' => array('PaymentController@addtocart'),'method' => 'post')) }}
          {{ Form::hidden('order', 1) }}
          {{ Form::hidden('team', 1) }}
          {{ Form::hidden('qty', 1) }}
          {{ Form::hidden('event', $event->id) }}
          @if($valid)
          <button class="btn btn-block btn-primary">Register Team</button>
          @else
          <button class="btn btn-block btn-primary disabled" disable="disable">Register closed</button>
          @endif
          {{ Form::close() }}
          @endif
        </div>
        <h3><span class="retinaicon-essentials-042"></span></h3>
        <h4>Event Details</h4>
        <div class="list-group">
          <p>
            <strong>Location: </strong> {{$event->location}} <br>
            <strong>Date: </strong> {{ date("M d",strtotime($event->start)) }} - {{ date("M d",strtotime($event->end)) }}
          </p>
          <p>For more information<br>
            <strong><span class="retinaicon-communication-002"></span> &nbsp; Call:</strong> &nbsp; {{$event->club->phone}} <br>
            <strong><span class="retinaicon-essentials-156"></span>  &nbsp; Email:</strong> &nbsp; {{$event->club->email}}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@stop