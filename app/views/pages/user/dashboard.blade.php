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
            <div class="menu">
               <div class="user-avatar" style="background-image: url({{ URL::asset($user->avatar); }});">
               </div>
               <div class="logo" style="background-image: url({{ URL::asset('images/league-together-logo.svg'); }})"></div>
               <div class="container menu-container">
                  <div class="row menu-item">
                     <h5>Dashboard</h5>
                  </div>
                  <div class="row menu-item">
                     <h5>
                        <i class="fa fa-users"></i><br />Management
                     </h5>
                  </div>
                  <div class="row menu-item">
                     <h5>
                        <i class="fa fa-bar-chart-o"></i><br />Accounting
                     </h5>
                  </div>
               </div>
            </div>
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
                     <h6 class="media-heading">User Info</h6>
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
      </div>
   </div>
</div>
@stop