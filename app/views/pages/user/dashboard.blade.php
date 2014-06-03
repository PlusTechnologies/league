@extends('layouts.dashboard.default')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      @if(Auth::check())
      <a class="btn btn-lg pull-right btn-primary" href="{{ URL::route('logout') }}">Logout</a>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12 app-frame">
      <div class="row app-header">
        <div class="col-sm-9">
          <div class="user-name pull-left">
            <h5>{{$user->firstname}} {{$user->lastname}}</h5>
          </div>
          <div class="user-role pull-left">
            <h6>Admin for <strong>@foreach($organizations as $organization)
            {{$organization->name}}
            @endforeach</strong></h6>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="search pull-right">
            <div class="input-group">
              <input type="text" class="form-control">
              <span class="input-group-btn">
              <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
              </button>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="menu">
            <div class="user-avatar" style="background-image: url({{ URL::asset($user->avatar); }});">
            </div>
            <div class="logo" style="background-image: url({{ URL::asset('images/league-together-logo.svg'); }})"></div>
            <div class="container menu-container">
              <div class="row menu-item">
                <h5><a href="">Dashboard</a></h5>
              </div>
              <div class="row menu-item">
                <h5>
                <a href=""><i class="fa fa-users"></i><br />Management</a>
                </h5>
              </div>
              <div class="row menu-item">
                <h5>
                <a href=""><i class="fa fa-bar-chart-o"></i><br />Accounting</a>
                </h5>
              </div>
            </div>
          </div>
          <!-- PROFILE -->
          <!-- <div class="display-none"> -->
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
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title">My Organizations</h3>
                        </div>
                        <div class="panel-body">
                          <div class="list-group">
                            @foreach($organizations as $organization)
                            <a class="list-group-item" href="{{URL::action('OrganizationController@show', array($organization->id))}}">
                            {{HTML::image($organization->logo, $organization->name, array('class'=>'img-thumbnail','width'=>55));}}
                            {{$organization->name}}
                            </a>
                            @endforeach
                          </div>
                        </div>
                      </div>
                      <br>
                      <a class="btn btn-embossed btn-primary" href="{{ URL::route('dashboard.organization.create') }}">New Organization</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-6">
                      Affiliations
                      <br>
                      <br>
                      <a class="btn btn-embossed btn-primary" href="{{ URL::route('dashboard.organization.create') }}">Join Organization</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- </div> -->
          <!-- /PROFILE -->
          <!-- DASHBOARD -->
          <!-- <div class="display-none"> -->
            <div class="row dashboard-background" style="background-image: url({{ URL::asset('images/landing-background-1.jpg'); }})">
              <div class="col-sm-12">
                <!-- <div class="team-count pull-left">
                  <div class="row">
                    <div class="col-sm-12">
                      <h1>10</h1>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <h6>Teams</h6>
                    </div>
                  </div>
                </div> -->
                <div class="org-header pull-left">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="fileinput-new thumbnail org-thumb">
                        <img src="http://placehold.it/90x90" >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="org-name pull-left dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><h2 class="">Organization Name 1<span class="caret"></span></h2></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Organization Name 2</a></li>
                    <li><a href="#">Organization Name 3</a></li>
                    <li><a href="#">Organization Name 4</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="row space-top-1">
              <!-- Calendar Widget -->
              <div class="col-sm-6">
                <div class="widget">
                  <div class="bg-color default">
                    <div class="box-padding">
                      <div class="row">
                        <div class="col-sm-2">
                          <h4 class="col-cal-icon"><i class="fa fa-calendar"></i></h4>
                        </div>
                        <div class="col-sm-7">
                          <h4>Calendar</h4>
                        </div>
                        <div class="col-sm-3">
                          <a class="btn btn-sm pull-right btn-primary" href="#">Create New <i class="fa fa-plus-circle"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-2 col-cal-date">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-day">31</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-month">May</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">9 Grade Tryouts</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-2 col-cal-date">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-day">31</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-month">May</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">9 Grade Tryouts</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-2 col-cal-date">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-day">31</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-month">May</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">9 Grade Tryouts</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-2 col-cal-date">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-day">31</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-month">May</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">9 Grade Tryouts</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /Calendar Widget -->
              <!-- Announcement Widget -->
              <div class="col-sm-6">
                <div class="widget">
                  <div class="bg-color default">
                    <div class="box-padding">
                      <div class="row">
                        <div class="col-sm-2">
                          <h4 class="col-cal-icon"><i class="fa fa-bullhorn"></i></h4>
                        </div>
                        <div class="col-sm-7">
                          <h4>Announcements</h4>
                        </div>
                        <div class="col-sm-3">
                          <a class="btn btn-sm pull-right btn-primary" href="#">Create New <i class="fa fa-plus-circle"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-2 col-cal-date">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-day">31</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-month">May</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">9 Grade Tryouts</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-2 col-cal-date">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-day">31</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-month">May</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">9 Grade Tryouts</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-2 col-cal-date">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-day">31</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-month">May</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">9 Grade Tryouts</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-2 col-cal-date">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-day">31</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-month">May</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">9 Grade Tryouts</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /Announcement Widget -->
            </div>
            <div class="row space-top-1 space-bottom-1">
              <!-- Earnings Widget -->
              <div class="col-sm-12">
                <div class="widget">
                  <div class="bg-color default">
                    <div class="box-padding">
                      <div class="row">
                        <div class="col-sm-1">
                          <h4 class="col-cal-icon"><i class="fa fa-bar-chart-o"></i></h4>
                        </div>
                        <div class="col-sm-7">
                          <h4>Earnings</h4>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-btn">
                              <button class="btn" type="button"><span class="fui-calendar"></span></button>
                              </span>
                              <input type="text" class="form-control hasDatepicker" value="14 March, 2013" id="datepicker-01">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-btn">
                              <button class="btn" type="button"><span class="fui-calendar"></span></button>
                              </span>
                              <input type="text" class="form-control hasDatepicker" value="14 March, 2013" id="datepicker-01">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-1 col-cal-date">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-day">31</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-month">May</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-11">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">9 Grade Tryouts</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-1 col-cal-date">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-day">31</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-month">May</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-11">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">9 Grade Tryouts</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-1 col-cal-date">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-day">31</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-month">May</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-11">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">9 Grade Tryouts</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-1 col-cal-date">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-day">31</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-month">May</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-11">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">9 Grade Tryouts</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /Earnings Widget -->
            </div>
          <!-- </div> -->
          <!-- /DASHBOARD -->
          <!-- MANAGEMENT -->
          <!-- <div class="display-none"> -->
            <div class="row dashboard-background" style="background-image: url({{ URL::asset('images/landing-background-1.jpg'); }})">
              <div class="col-sm-12">
                <div class="org-name pull-left dropdown">
                  <h2 class="">Organization Management</h2>
                </div>
              </div>
            </div>
            <div class="row space-top-1 space-bottom-1">
              <!-- Earnings Widget -->
              <div class="col-sm-12">
                <div class="widget">
                  <div class="bg-color default">
                    <div class="box-padding">
                      <div class="row">
                        <div class="col-sm-1">
                          <h4 class="col-cal-icon"><i class="fa fa-flag"></i></h4>
                        </div>
                        <div class="col-sm-3">
                          <h4>Org Name</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-1 col-org-thumb">
                      <div class="fileinput-new thumbnail org-thumb">
                        <img src="http://placehold.it/90x90" >
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">Org Name</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2 text-center">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">25</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Teams</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2 text-center">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">25</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Couches</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2 text-center">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">25</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Players</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-1 col-md-offset-1">
                      <div class="row">
                        <div class="col-sm-12">
                          <a class="btn btn-sm pull-right btn-primary space-top-1" href="#">Create New <i class="fa fa-plus-circle"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-1 col-org-thumb">
                      <div class="fileinput-new thumbnail org-thumb">
                        <img src="http://placehold.it/90x90" >
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">Org Name</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-sm-2 text-center">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">25</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Teams</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2 text-center">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">25</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Couches</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2 text-center">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">25</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Players</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-1 col-md-offset-1">
                      <div class="row">
                        <div class="col-sm-12">
                          <a class="btn btn-sm pull-right btn-primary space-top-1" href="#">Create New <i class="fa fa-plus-circle"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-1 col-org-thumb">
                      <div class="fileinput-new thumbnail org-thumb">
                        <img src="http://placehold.it/90x90" >
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">Org Name</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-sm-2 text-center">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">25</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Teams</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2 text-center">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">25</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Couches</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2 text-center">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">25</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Players</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-1 col-md-offset-1">
                      <div class="row">
                        <div class="col-sm-12">
                          <a class="btn btn-sm pull-right btn-primary space-top-1" href="#">Create New <i class="fa fa-plus-circle"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-1 col-org-thumb">
                      <div class="fileinput-new thumbnail org-thumb">
                        <img src="http://placehold.it/90x90" >
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">Org Name</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-sm-2 text-center">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">25</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Teams</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2 text-center">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">25</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Couches</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2 text-center">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">25</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Players</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-1 col-md-offset-1">
                      <div class="row">
                        <div class="col-sm-12">
                          <a class="btn btn-sm pull-right btn-primary space-top-1" href="#">Create New <i class="fa fa-plus-circle"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /Earnings Widget -->
            </div>
            <!-- /MANAGEMENT -->
            <!-- </div> -->
          <!-- </div> -->
          <!-- TEAM DASHBOARD -->
          <!-- <div class="display-none"> -->
            <div class="row dashboard-background" style="background-image: url({{ URL::asset('images/landing-background-1.jpg'); }})">
              <div class="col-sm-12">
                <div class="org-header pull-left">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="fileinput-new thumbnail org-thumb">
                        <img src="http://placehold.it/90x90" >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="org-name pull-left dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><h2 class="">Team Name 1<span class="caret"></span></h2></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Team Name 2</a></li>
                    <li><a href="#">Team Name 3</a></li>
                    <li><a href="#">Team Name 4</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="row space-top-1">
              <!-- Calendar Widget -->
              <div class="col-sm-6">
                <div class="widget">
                  <div class="bg-color default">
                    <div class="box-padding">
                      <div class="row">
                        <div class="col-sm-2">
                          <h4 class="col-cal-icon"><i class="fa fa-calendar"></i></h4>
                        </div>
                        <div class="col-sm-7">
                          <h4>Calendar</h4>
                        </div>
                        <div class="col-sm-3">
                          <a class="btn btn-sm pull-right btn-primary" href="#">Create New <i class="fa fa-plus-circle"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-2 col-cal-date">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-day">31</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-month">May</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">9 Grade Tryouts</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-2 col-cal-date">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-day">31</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-month">May</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">9 Grade Tryouts</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-2 col-cal-date">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-day">31</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-month">May</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">9 Grade Tryouts</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-2 col-cal-date">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-day">31</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-month">May</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">9 Grade Tryouts</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /Calendar Widget -->
              <!-- Announcement Widget -->
              <div class="col-sm-6">
                <div class="widget">
                  <div class="bg-color default">
                    <div class="box-padding">
                      <div class="row">
                        <div class="col-sm-2">
                          <h4 class="col-cal-icon"><i class="fa fa-bullhorn"></i></h4>
                        </div>
                        <div class="col-sm-7">
                          <h4>Announcements</h4>
                        </div>
                        <div class="col-sm-3">
                          <a class="btn btn-sm pull-right btn-primary" href="#">Create New <i class="fa fa-plus-circle"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-2 col-cal-date">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-day">31</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-month">May</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">9 Grade Tryouts</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-2 col-cal-date">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-day">31</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-month">May</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">9 Grade Tryouts</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-2 col-cal-date">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-day">31</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-month">May</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">9 Grade Tryouts</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white clearfix">
                    <div class="col-sm-2 col-cal-date">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-day">31</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-month">May</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="row-cal-title">9 Grade Tryouts</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="row-location">Dallas, TX</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /Announcement Widget -->
            </div>
            <div class="row space-top-1 space-bottom-1">
              <!-- Messaging Widget -->
              <div class="col-sm-12">
                <div class="widget">
                  <div class="bg-color default">
                    <div class="box-padding">
                      <div class="row">
                        <div class="col-sm-1">
                          <h4 class="col-cal-icon"><i class="fa fa-bar-chart-o"></i></h4>
                        </div>
                        <div class="col-sm-8">
                          <h4>Messaging</h4>
                        </div>
                        <div class="col-sm-3">
                          <a class="btn btn-sm pull-right btn-primary" href="#">Create New <i class="fa fa-plus-circle"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color white conversation clearfix">
                    <div class="box-padding">
                      <div class="media media-left">
                        <a class="pull-left" href="#">
                        <div class="fileinput-new thumbnail org-thumb">
                          <img src="http://placehold.it/90x90">
                        </div>
                        </a>
                        <div class="media-body">
                          <h5 class="media-heading normal">Daenerys Targaryen</h5>
                          <h6 class="timestamp">
                          Sent on <span>Tuesday, 17th January 2018</span>
                          </h6>
                          <div class="message message-right">
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                          </div>
                        </div>
                      </div>
                      <div class="media media-right">
                        <a class="pull-right" href="#">
                        <div class="fileinput-new thumbnail org-thumb">
                          <img src="http://placehold.it/90x90">
                        </div>
                        </a>
                        <div class="media-body">
                          <h5 class="media-heading normal">Margaery Tyrell</h5>
                          <h6 class="timestamp">
                          Sent on <span>Tuesday, 17th January 2018</span>
                          </h6>
                          <div class="message message-left">
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                          </div>
                        </div>
                      </div>
                      <div class="media media-left">
                        <a class="pull-left" href="#">
                        <div class="fileinput-new thumbnail org-thumb">
                          <img src="http://placehold.it/90x90">
                        </div>
                        </a>
                        <div class="media-body">
                          <h5 class="media-heading normal">Administrator</h5>
                          <h6 class="timestamp">
                          Sent on <span>Tuesday, 17th January 2018</span>
                          </h6>
                          <div class="message message-admin">
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-color default rounded-bottom">
                    <div class="box-padding">
                      <div class="row">
                        <div class="col-sm-12">
                          <form>
                            <textarea class="input-block-level" id="inputMessage" rows="5" placeholder="Your wonderful message"></textarea>
                            <a class="btn btn-sm btn-primary" href="#">Create New <i class="fa fa-plus-circle"></i></a>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /Messaging Widget -->
            </div>
          <!-- </div> -->
          <!-- /TEAM DASHBOARD -->
        </div>
      </div>
    </div>
  </div>
  @stop