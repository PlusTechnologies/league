@extends('layouts.dashboard.default')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12 app-header">
    </div> 
    <div class="col-sm-12 app-frame">
      <div class="row ">
        <div class="col-sm-2 app-menu">
          <div class="menu-title">General</div>
          <div class="list-group">
            <a href="{{URL::action('OrganizationController@show', $organization->id)}}" class="list-group-item active">
              <i class="fa fa-user"></i> Overview
            </a>
            <a href="#" class="list-group-item">
              <i class="fa fa-user"></i> Roster
            </a>
            <a href="#" class="list-group-item">
              <i class="fa fa-users"></i> Teams
            </a>
            <a href="#" class="list-group-item">
              <i class="fa fa-bar-chart-o"></i> Accounting
            </a>
            <a href="#" class="list-group-item">
              <i class="fa fa-envelope-o"></i> Communication
            </a>
            <a href="{{URL::action('DiscountController@index', $organization->id)}}" class="list-group-item">
              <i class="fa fa-ticket"></i> Discounts
            </a>
          </div>
        </div>
        <div class="col-sm-10 col-sm-offset-2">
          <div class="app-title">
            <div style="background-image: url(http://leaguetogether.dev/images/landing-background-1.jpg)" class="row dashboard-background">
              <div class="col-sm-12">
                <div class="org-header pull-left">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="fileinput-new thumbnail org-thumb">
                        <img src="{{$organization->logo}}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="org-name pull-left dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#"><h2 class="">{{$organization->name}}<span class="caret"></span></h2></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Organization Name 2</a></li>
                    <li><a href="#">Organization Name 3</a></li>
                    <li><a href="#">Organization Name 4</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <h2 class="text-center home-title">Overview</h2>
            <p class="text-center"><small >Here is the big picture.</small> </p>
            <hr>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="graph">
                <ul class="nav nav-pills ranges">
                <li class="active"><a href="#" data-range='7'>7 Days</a></li>
                <li><a href="#" data-range='30'>30 Days</a></li>
                <li><a href="#" data-range='60'>60 Days</a></li>
                <li><a href="#" data-range='90'>90 Days</a></li>
              </ul>
                <br>
                <div id="graph-sales" class="graph-area"></div>
                <p class="text-center"><small >Sales summary</small></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="graph">
                <ul class="nav nav-pills ranges">
                <li class="active"><a href="#" data-range='7'>7 Days</a></li>
                <li><a href="#" data-range='30'>30 Days</a></li>
                <li><a href="#" data-range='60'>60 Days</a></li>
                <li><a href="#" data-range='90'>90 Days</a></li>
              </ul>
                <br>
                <div id="graph-sales-item" class="graph-area"></div>
                 <p class="text-center"><small>Sale Segregation</small></p>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title ">
                    <div class="row">
                      <div class = "col-md-6">Events</div>
                      <div class = "col-md-6 text-right">
                        <a class="btn btn-xs btn-success" href="#">
                          <i class="fa fa-plus"></i> Add
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
                      <div class = "col-md-6">Announcements</div>
                      <div class = "col-md-6 text-right">
                        <a class="btn btn-xs btn-success" href="#">
                          <i class="fa fa-plus"></i> Add
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
</div>
@stop
@section('script')
{{ HTML::script('js/overview.js')}}
@stop