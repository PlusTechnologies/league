@extends('layouts.dashboard.default')
@section('content')
<nav class="nav-player-dashboard">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="org-thumb">
          {{HTML::image($user->avatar, $user->firstname, array('class'=>'','width'=>85));}}
          <span class="user-name-title">{{$user->firstname}} {{$user->lastname}}</span>
        </div>
      </div>
    </div>
  </div>
</nav>
<nav role="sub-navigation" class="account-subnavigation clear-fix ng-scope">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <ul class="nav navbar-nav navbar-left ng-scope" ng-controller="SubnavCtrl">
          <li class="selected">
            <a href="{{URL::action('AccountController@index')}}">
              <span class="icon-am retinaicon-essentials-006"></span> 
              <span class="subnav-link-name ng-scope" translate="">Overview</span>
            </a>
          </li>
          <li>
            <a href="{{URL::action('AccountController@payments')}}">
              <span class="icon-am retinaicon-finance-001"></span> 
              <span class="subnav-link-name ng-scope">Payments</span>
            </a>
          </li>
          <li>
            <a href="{{URL::action('AccountController@players')}}">
              <span class="icon-am retinaicon-communication-006"></span>
              <span class="subnav-link-name ng-scope">Players</span>
            </a>
          </li>
          <li>
            <a href="{{URL::action('AccountController@clubs')}}">
              <span class="icon-am retinaicon-business-042"></span>
              <span class="subnav-link-name ng-scope">Clubs</span>
            </a>
          </li>
          <li>
            <a href="{{URL::action('AccountController@schedule')}}">
              <span class="icon-am retinaicon-essentials-127"></span>
              <span class="subnav-link-name ng-scope">Games Schedule</span>
            </a>
          </li>
          <li>
            <a href="{{URL::action('AccountController@edit')}}">
              <span class="icon-am retinaicon-essentials-007"></span> 
              <span class="subnav-link-name ng-scope">Profile</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1 ">

      <div class="col-sm-6">
        <span class="section-title">
          <span class="icon-am retinaicon-essentials-006"></span> 
          Overview
        </span>
        <div class="section-description">
          <p>Find here are the most important news about the clubs you followed, and a summary of your recent activity.</p>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              <div class="row">
                <div class = "col-md-12">Invitations
                  <a class="pull-right" href="#">
                    View All
                  </a>
                </div>
              </div> 
            </h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <h3>Join a Club</h3>
                <hr>
                <p>You have no invitation to join at the moment</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-12">
        <div class="row">
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">
                  <div class="row">
                    <div class = "col-md-12">Events
                      <a class="pull-right" href="#">
                        View All
                      </a>
                    </div>
                  </div> 
                </h3>
              </div>
              <div class="panel-body item-list-dashboard">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-xs-3 date-space">
                      <div class="date-mo">AUG</div>
                      <div class="date-da">15</div>
                      <div class="date-we">Monday</div>
                    </div>
                    <div class="col-xs-8 event-space">
                      <div class="event-title">Tryout - Boys Summer</div>
                      <div class="event-club">C2C Lacrosse</div>
                      <div class="event-join">
                        <a class="btn btn-primary btn-xs" href="">Register</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-xs-3 date-space">
                      <div class="date-mo">AUG</div>
                      <div class="date-da">15</div>
                      <div class="date-we">Monday</div>
                    </div>
                    <div class="col-xs-8 event-space">
                      <div class="event-title">Tryout - Boys Summer</div>
                      <div class="event-club">C2C Lacrosse</div>
                      <div class="event-join">
                        <a class="btn btn-primary btn-xs" href="">Register</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-xs-3 date-space">
                      <div class="date-mo">AUG</div>
                      <div class="date-da">15</div>
                      <div class="date-we">Monday</div>
                    </div>
                    <div class="col-xs-8 event-space">
                      <div class="event-title">Tryout - Boys Summer</div>
                      <div class="event-club">C2C Lacrosse</div>
                      <div class="event-join">
                        <a class="btn btn-primary btn-xs" href="">Register</a>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-md-6">
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
              <div class="panel-body item-list-dashboard">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-xs-3 club-space">
                      <img class="" src="/images/avatar/1409021664-profile_pic.png">
                    </div>
                    <div class="col-xs-9 announcement-space">
                      <span>
                        <span class="annoucement-club">C2C Lacrosse</span>
                        <span class="annoucement-date">Aug 19</span>
                      </span>
                      <div class="annoucement-content">
                        <p>Message content goes here, first 190 charcters will be shown with a link for the full message..<br>
                          <a  class="text-right btn-block" href="">Read More</a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-xs-3 club-space">
                      <img class="" src="/images/avatar/1409021664-profile_pic.png">
                    </div>
                    <div class="col-xs-9 announcement-space">
                      <span>
                        <span class="annoucement-club">C2C Lacrosse</span>
                        <span class="annoucement-date">Aug 19</span>
                      </span>
                      <div class="annoucement-content">
                        <p>Message content goes here, first 190 charcters will be shown with a link for the full message..<br>
                          <a  class="text-right btn-block" href="">Read More</a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-xs-3 club-space">
                      <img class="" src="/images/avatar/1409021664-profile_pic.png">
                    </div>
                    <div class="col-xs-9 announcement-space">
                      <span>
                        <span class="annoucement-club">C2C Lacrosse</span>
                        <span class="annoucement-date">Aug 19</span>
                      </span>
                      <div class="annoucement-content">
                        <p>Message content goes here, first 190 charcters will be shown with a link for the full message..<br>
                          <a  class="text-right btn-block" href="">Read More</a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

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

              <ul class="list-group payment-list">
                <a href = "" class="odd list-group-item col-md-12">
                  <div class="payment-date col-xs-2 ">
                    <div class="date-mo">AUG</div>
                    <div class="date-da">15</div>
                  </div>
                  <div class="payment-description col-xs-6">
                    <div class="payment-item">Tryout - Girls Summer 14</div>
                    <div class="payment-club">C2C Lacrosse</div>
                  </div>
                  <div class="col-xs-2 text-center payment-method">
                    Visa ending 3442
                  </div>
                  <div class="payment-amount col-xs-2 text-right">
                    $45.85
                  </div>
                </a>
                <a href = "" class="odd list-group-item col-md-12">
                  <div class="payment-date col-md-2">
                    <div class="date-mo">AUG</div>
                    <div class="date-da">15</div>
                  </div>
                  <div class="payment-description col-xs-6">
                    <div class="payment-item">Tryout - Girls Summer 14</div>
                    <div class="payment-club">C2C Lacrosse</div>
                  </div>
                  <div class="col-xs-2 text-center payment-method">
                    Visa ending 3442
                  </div>
                  <div class="payment-amount col-xs-2 text-right">
                    $355.59
                  </div>
                </a>
              </ul>
              <div class="panel-body">
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