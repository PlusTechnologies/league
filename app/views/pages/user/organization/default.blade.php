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
            <a href="#" class="list-group-item">
              <i class="fa fa-ticket"></i> Discounts
            </a>
          </div>
        </div>
        <div class="col-sm-10 col-sm-offset-2">
          <div class="app-title">
            <div style="background-image: url(http://leaguetogether.dev/images/landing-background-1.jpg)" class="row dashboard-background">
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

            <div class="image"><i class="fa fa-sitemap"></i></div>
            <h2 class="text-center home-title">Organization Management</h2>
            <p class="text-center"><small >Take your first by exploring all the option in our system.</small> </p>
            <a class="btn btn-primary btn-sm" href="/dashboard/organization/create"> Create new organization</a>
            <hr>

          </div>
        </div>  
      </div>

    </div>
  </div>
  @stop