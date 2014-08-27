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
                        {{HTML::image($user->avatar, $user->firstname, array('class'=>'','width'=>100));}}
                      </div>
                    </div>
                  </div>
                </div>
                <h3 class="org-name">Welcome! {{$user->firstname}}</h3>
                <h2 class="home-title">Overview</h2>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
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
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="col-md-3 date-space">
                        <div class="date-mo">AUG</div>
                        <div class="date-da">15</div>
                        <div class="date-we">Monday</div>
                      </div>
                      <div class="col-md-9 event-space">
                        <div class="event-title">Tryout - Boys Summer</div>
                        <div class="event-club">C2C Lacrosse</div>
                        <div class="event-join">
                          <a class="btn btn-primary btn-xs" href="">Register</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="col-md-3 date-space">
                        <div class="date-mo">AUG</div>
                        <div class="date-da">15</div>
                        <div class="date-we">Monday</div>
                      </div>
                      <div class="col-md-9 event-space">
                        <div class="event-title">Tryout - Boys Summer</div>
                        <div class="event-club">C2C Lacrosse</div>
                        <div class="event-join">
                          <a class="btn btn-primary btn-xs" href="">Register</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="col-md-3 date-space">
                        <div class="date-mo">AUG</div>
                        <div class="date-da">15</div>
                        <div class="date-we">Monday</div>
                      </div>
                      <div class="col-md-9 event-space">
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
                  <div class="row">
                    <div class="col-md-4">
                      <div class="col-md-3 club-space">
                        <img class="" src="/images/avatar/1409021664-profile_pic.png">
                      </div>
                      <div class="col-md-9 announcement-space">
                        <div class="row">
                          <div class="annoucement-club col-md-8">C2C Lacrosse</div>
                          <div class="annoucement-date col-md-4 text-right">Aug 19</div>
                        </div>
                        
                        <div class="annoucement-content">
                          <p>Message content goes here, first 190 charcters will be shown with a link for the full message..<br>
                            <a  class="text-right btn-block" href="">Read More</a>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="col-md-3 club-space">
                        <img class="" src="/images/avatar/1409021664-profile_pic.png">
                      </div>
                      <div class="col-md-9 announcement-space">
                        <div class="row">
                          <div class="annoucement-club col-md-8">C2C Lacrosse</div>
                          <div class="annoucement-date col-md-4 text-right">Aug 19</div>
                        </div>
                        
                        <div class="annoucement-content">
                          <p>Message content goes here, first 190 charcters will be shown with a link for the full message..<br>
                            <a  class="text-right btn-block" href="">Read More</a>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="col-md-3 club-space">
                        <img class="" src="/images/avatar/1409021664-profile_pic.png">
                      </div>
                      <div class="col-md-9 announcement-space">
                        <div class="row">
                          <div class="annoucement-club col-md-8">C2C Lacrosse</div>
                          <div class="annoucement-date col-md-4 text-right">Aug 19</div>
                        </div>
                        
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
            <div class="col-md-4">
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
                </div>
              </div>
            </div>
            <div class="col-md-8">
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
                      <div class="payment-date col-md-2 ">
                          <div class="date-mo">AUG</div>
                          <div class="date-da">15</div>
                      </div>
                      <div class="payment-description col-md-8">
                        <div class="payment-item">Tryout - Girls Summer 14</div>
                        <div class="payment-club">C2C Lacrosse</div>
                      </div>
                      <div class="payment-amount col-md-2">
                        $45.85
                      </div>
                    </a>
                    <a href = "" class="odd list-group-item col-md-12">
                      <div class="payment-date col-md-2">
                          <div class="date-mo">AUG</div>
                          <div class="date-da">15</div>
                      </div>
                      <div class="payment-description col-md-8">
                        <div class="payment-item">Tryout - Girls Summer 14</div>
                        <div class="payment-club">C2C Lacrosse</div>
                      </div>
                      <div class="payment-amount col-md-2">
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
  </div>
  <div class="row">
    <div class="col-sm-12">
      <br>
    </div>
  </div>

</div>
@stop