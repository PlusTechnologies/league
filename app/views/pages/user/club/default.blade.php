@extends('layouts.dashboard.default')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12 app-frame">
      <div class="row">
        <div class="col-sm-12">
          <div class="app-title">
            <div class="row">
              <div class="col-sm-12">
                <div class="org-header">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="org-thumb">
                        {{HTML::image($club->logo, $club->name, array('class'=>'','width'=>100));}}
                      </div>
                    </div>
                  </div>
                </div>
                <h3 class="org-name">{{$club->name}}</h3>
                <h2 class="home-title">Overview</h2>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="graph">
                <ul class="nav nav-pills ranges">
                  <li class="active"><a href="#" data-range='7'>7 Days</a></li>
                  <li><a href="#" data-range='30'>30 Days</a></li>
                  <li><a href="#" data-range='60'>60 Days</a></li>
                  <li><a href="#" data-range='90'>90 Days</a></li>
                </ul>
                <br>
                <div id="graph-sales" class="graph-area"></div>
                <p class="text-center graph-title">Sales summary</p>
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
                      <div class = "col-md-12">Events
                        <a class="pull-right" href="{{ URL::action('EventoController@index', $club->id) }}">
                          View All
                        </a>
                      </div>
                    </div> 
                  </h3>
                </div>
                <div class="panel-body">
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">
                    <div class="row">
                      <div class = "col-md-12">Announcements
                        <a class="pull-right" href="#">
                          View All
                        </a>
                      </div>
                    </div> 
                  </h3>
                </div>
                <div class="panel-body">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">
                    <div class="row">
                      <div class = "col-md-12">Recent Payments
                        <a class="pull-right" href="#">
                          View All
                        </a>
                      </div>
                    </div> 
                  </h3>
                </div>
                <div class="panel-body">
                </div>
              </div>
            </div>
          </div>

        </div>  
      </div>
    </div>
  </div>
  <div class="row">
      <div class="col-sm-12">
        <br>
      </div>
  </div>

</div>
@stop
@section('script')
{{ HTML::script('js/dashboard/overview.js')}}
@stop