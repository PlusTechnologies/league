@extends('layouts.dashboard.default')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12 app-frame">
      <div class="row ">
        <div class="col-sm-12 app-title">
          <div class="image"><i class="retinaicon-essentials-116"></i></div>
          <h2 class="text-center">Discounts</h2>
          <p class="text-center"><small >Create and manage new discount codes for your club.</small> </p>
          <a class="btn btn-primary btn-sm" href="{{ URL::action('DiscountController@create', $club->id) }}"> Create new discount</a>
          <h2 class="home-title">Overview</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="graph">
            <ul class="nav nav-pills ranges line">
              <li class="active"><a href="#" data-range='7' data-club="{{$club->id}}" >7 Days</a></li>
              <li><a href="#" data-range='30' data-club="{{$club->id}}">30 Days</a></li>
              <li><a href="#" data-range='60' data-club="{{$club->id}}">60 Days</a></li>
              <li><a href="#" data-range='90' data-club="{{$club->id}}">90 Days</a></li>
            </ul>
            <br>
            <div id="graph-usage" class="graph-area"></div>
            <p class="text-center"><small >Usage summary</small></p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="graph">
            <ul class="nav nav-pills ranges donut">
              <li class="active"><a href="#" data-range='7' data-club="{{$club->id}}">7 Days</a></li>
              <li><a href="#" data-range='30' data-club="{{$club->id}}">30 Days</a></li>
              <li><a href="#" data-range='60' data-club="{{$club->id}}">60 Days</a></li>
              <li><a href="#" data-range='90' data-club="{{$club->id}}">90 Days</a></li>
            </ul>
            <br>
            <div id="graph-overview" class="graph-area"></div>
            <p class="text-center"><small>Usage Segregation</small></p>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title ">
                <div class="row">
                  <div class = "col-md-12">Discount codes
                    <a class="pull-right" href="{{ URL::action('DiscountController@create', $club->id) }}">
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
                    <th>Code
                    </th>
                    <th>Valid
                    </th>
                    <th>Discount
                    </th>
                    <th>Limit
                    </th>
                    <th>Used
                    </th>
                    <th>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($discounts_available as $discount)
                  <tr>
                    <td class="">{{$discount->name}}
                    </td>
                    <td class="">
                      {{ date("M d",strtotime($discount->start)) }} to {{date('M d',strtotime($discount->end))}} 
                    </td>
                    <td class="">
                      {{$discount->percent * 100}}%
                    </td>
                    <td class="">
                      {{$discount->used}}/{{$discount->limit}}
                    </td>
                    <td class="">
                      {{money_format('%.2n',$discount->saved)  }}
                    </td>
                    <td class="text-right" >
                      <a class="btn btn-xs btn-primary" href="{{URL::action('DiscountController@edit', [$club->id,$discount->id])}}" role="button">
                        Edit
                      </a>
                      {{ Form::open(array('action' => array('DiscountController@destroy',$club->id,$discount->id), 'method' => 'delete', 'class'=>'btn-trash')) }}
                          <button class="btn btn-xs btn-danger " type="submit"><i class="fa fa-trash-o"></i></button>
                      {{ Form::close() }}
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
                  <div class = "col-md-6">Expired codes</div>
                </div> 
              </h3>
            </div>
            <div class="table-responsive">
              <table class="table table-general">
                <thead>
                  <tr>
                    <th>Code
                    </th>
                    <th>Valid
                    </th>
                    <th>Discount
                    </th>
                    <th>Limit
                    </th>
                    <th>Used
                    </th>
                    <th>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($discounts_expired as $discount)
                  <tr>
                    <td class="">
                      {{$discount->name}}
                    </td>
                    <td class="">
                      {{ date("M d",strtotime($discount->start)) }} to {{date('M d',strtotime($discount->end))}} 
                    </td>
                    <td class="">
                      {{$discount->percent * 100}}%
                    </td>
                    <td class="">
                      {{$discount->limit}}
                    </td>
                    <td class="">
                     {{money_format('%.2n',$discount->saved)  }}
                    </td>
                    <td class="text-right" >
                      {{ Form::open(array('action' => array('DiscountController@destroy',$club->id,$discount->id), 'method' => 'delete', 'class'=>'btn-trash')) }}
                          <button class="btn btn-xs btn-danger " type="submit"><i class="fa fa-trash-o"></i></button>
                      {{ Form::close() }}
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
@section('script')
<script src="//cdn.jsdelivr.net/spinjs/1.3.0/spin.min.js"></script>
{{ HTML::script('js/dashboard/discount.js')}}
<script type="text/javascript">
$(document).ready(function(){
  requestData(7, {{$club->id}}, chart, 1);
  requestData(7, {{$club->id}}, dchart, 2);
})
</script>

@stop
