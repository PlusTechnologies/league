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
                {{ Form::open(array('id'=>'show_accounts','method' => 'post', 'files'=>true, 'class'=>'form-inline')) }}
                    <div class="col-xs-3">
                      <div class="form-group">
                        <label class="sr-only">Event</label>
                        {{Form::select('size', array('C' => 'Camp', 'T' => 'Training', 'Tr' => 'Tour', 'Tor' => 'Tornament')) }}
                      </div>
                    </div>
                    <div class="col-xs-3">
                      <div class="form-group">
                        <label>From</label>
                        {{ Form::text('date_from', '', array('class' => 'form-control datepicker')) }}
                        <span class="glyphicon glyphicon-calendar"></span>
                      </div>
                      
                    </div>
                    <div class="col-xs-3">
                      <div class="form-group">
                        <label>To</label>
                        {{ Form::text('date_from', '', array('class' => 'form-control datepicker')) }}
                        <span class="glyphicon glyphicon-calendar"></span>
                      </div>
                    </div>
                    <div class="col-xs-1">
                      <div class="form-group">
                        <button type="submit" class="btn btn-default">View</button>
                      </div>
                    </div>
                    
                {{ Form::close()}}
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
                  <div class = "col-md-12">Account History
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <td>Completed</td>
                          <td width="15%" class='pull-right'>Amount</td>
                        </tr>
                      </thead> 
                      <tbody> 
                        <tr>
                          <td width="15%"><span class='small'>Aug 1</span></td>
                          <td width="70%"><span class='small'>Tour payment</span></td>
                          <td width="15%"><span class='small'>-$ 800</td>
                        </tr>
                        <tr>
                          <td width="15%"><span class='small'>Aug 8</span></td>
                          <td width="70%"><span class='small'>Training payment</span></td>
                          <td width="15%"><span class='small'>-$ 300</span></td>
                        </tr>
                        <tr>
                          <td width="15%"><span class='small'>Aug 14</span></td>
                          <td width="70%"><span class='small'>Camp payment</span></td>
                          <td width="15%"><span class='small'>-$ 250</span></td>
                        </tr>
                        <tr>
                          <td width="15%"><span class='small'>Aug 18</span></td>
                          <td width="70%"><span class='small'>Tornament payment</span></td>
                          <td width="15%"><span class='small'>-$ 250</span></td>
                        </tr>
                        <tr>
                          <td width="15%"><span class='small'>Aug 25</span></td>
                          <td width="70%"><span class='small'>Camp payment</span></td>
                          <td width="15%"><span class='small'>-$ 250</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div> 
              </h3>
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
  <script>
    $(function() {
      $( ".datepicker" ).datepicker();
    });
  </script>
@stop