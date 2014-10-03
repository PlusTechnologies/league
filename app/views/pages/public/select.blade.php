@extends('layouts.public.default')
@section('content')
<div class="container">
  <div class="maintitle">
    <h4 class="text-center">Select the participants</h4>
    <span class="border"></span>
  </div>
  <div class="row">
    <div class="col-sm-12">
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
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="widget space-top-2">
            <div class="bg-color default">
              <h4 class="widget-title">Items</h4>
            </div>
            <div class="bg-color white">
              <div class="table-responsive">
                <!-- Cart Contents -->
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Description</th>
                      <th>Select Player</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $key=>$item)
                    @for ($i = 1; $i <= $item->quantity; $i++)
                    <tr>
                      <td class="details">
                        <div class="clearfix">
                          <a class="delete btn pull-right btn-danger btn-sm fa fa-trash-o" href="{{URL::action('PaymentController@removefromcart', array($item->identifier))}}">
                          </a>
                          <div class="pull-left no-float-xs">
                            <a class="title" href="{{URL::action('EventoController@publico', array($item->event))}}">{{$item->name}}
                            </a>
                          </div>
                        </div>
                      </td>
                      <td class="text-center">
                        @if($item->player_id)
                          @if(array_key_exists($i, $item->player_id)) 
  
                            @foreach($players as $player)
                                  @if($player->id ==$item->player_id[$i])
                                    {{$player->firstname}} {{$player->lastname}}
                                  @endif
                            @endforeach

                            {{Form::open(array('action' => array('PaymentController@removeplayertocart', $key ),'method' => 'DELETE', 'class'=>'form-inline')) }}
                            {{ Form::hidden('index', $i) }}
                            <button type="submit" class="btn btn-sm btn-info fa fa-trash-o"></button>
                            {{Form::close()}}

                          @else

                            {{Form::open(array('action' => array('PaymentController@addplayertocart', $key ),'method' => 'post', 'class'=>'form-inline')) }}
                            {{ Form::hidden('index', $i) }}
                            <div class="form-group">
                              <select name="player" id="" class="form-control input-sm">
                                <option></option>
                                @foreach($players as $player)
                                  <option value="{{$player->id}}">{{$player->firstname}} {{$player->lastname}}</option>
                                @endforeach
                              </select>
                            </div>
                            <button type="submit" class="btn btn-sm btn-info fa fa-refresh"></button>
                            {{Form::close()}}
                          @endif
                        @else
                          {{Form::open(array('action' => array('PaymentController@addplayertocart', $key ),'method' => 'post', 'class'=>'form-inline')) }}
                          {{ Form::hidden('index', $i) }}
                          <div class="form-group">
                            <select name="player" id="" class="form-control input-sm">
                              <option></option>
                              @foreach($players as $player)
                                <option value="{{$player->id}}">{{$player->firstname}} {{$player->lastname}}</option>
                              @endforeach
                            </select>
                          </div>
                          <button type="submit" class="btn btn-sm btn-info fa fa-refresh"></button>
                          {{Form::close()}}
                        @endif                        
                      </td>
                      <td>{{money_format('%.2n',$item->price)  }}</td>
                    </tr>
                    @endfor

                    @endforeach
                  </tbody>
                </table>
                <!-- /Cart Contents -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 text-right">
          <a class="btn btn-sm btn-primary space-top-2" href="">Update</a>
          <a class="btn btn-sm btn-primary space-top-2" href="{{URL::action('PaymentController@create')}}">Check out</a>
        </div>
      </div>
    </div>
  </div>
</div>
@stop