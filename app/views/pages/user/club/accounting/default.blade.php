@extends('layouts.dashboard.default')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12 app-frame">
      <div class="row ">
        <div class="col-sm-12 app-title">
          <div class="image"><i class="retinaicon-essentials-116"></i></div>
          <h2 class="text-center">Accounting</h2>
          <p class="text-center"><small >Review Club's expenditures by category e.g Camp, tour etc...</small> </p>
          <div class="row">
              <div class="col-md-12">
                {{ Form::open(array('action' => array('AccountingController@accounthistory', $club->id),'id'=>'accounts_history','method' => 'post', 'class'=>'form-inline')) }}
                <div class="row">
                    <div class="col-xs-3">
                      <div class="form-group">
                        <label class="sr-only">Event</label>
                        {{Form::select('size', array('C' => 'Camp', 'T' => 'Training', 'Tr' => 'Tour', 'Tor' => 'Tornament')) }}
                      </div>
                    </div> 
                    <div class="col-xs-3">
                      <div class="form-group">
                        <label class="sr-only">From</label>
                        <div class="input-group input-group-sm">
                        {{ Form::text('date_from', '', array('class' => 'form-control datepicker')) }}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-3">
                      <div class="form-group">
                        <label class="sr-only">To</label>
                        <div class="input-group input-group-sm">
                        {{ Form::text('date_to', '', array('class' => 'form-control datepicker')) }}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                      </div>
                      </div>
                    </div>
                    <div class="col-xs-3">
                      <p>
                        <button type="submit" id="download" class="btn btn-primary">Generate</button>
                        <button type="submit" id="download" class="btn btn-primary">Download</button>
                      </p>
                    </div> 
                    
                </div>
                {{ Form::close()}}
              </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-hover">
                      <thead>
                        <tr>
                          <td width="15%">Completed</td>
                          <td width="70%"></td>
                          <td width="15%">Amount</td>
                        </tr>
                      </thead> 
                      <tbody>
                        @foreach($history as $listitem) 
                        <tr>
                          <td width="15%"><span class='small'>{{$listitem->created_at}}</span></td>
                          <td width="70%"><span class='small'>{{$listitem->description}}</span></td>
                          <td width="15%"><span class='small'>{{money_format('%.2n',$listitem->price)}}</td>
                        </tr>
                        @endforeach

                        
                       
                      </tbody>
                    </table>
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
  <script>
    $(function() {
      $( ".datepicker" ).datepicker();
    });
  </script>
@stop