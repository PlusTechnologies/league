@extends('layouts.dashboard.default')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
         <div class="row">
            <div class="col-sm-12">
               <h5>
                  Dashboard
               </h5>
            </div>
         </div>
         <hr>
         <div class="row">
            <div class="col-sm-12">
               <div class="row">
                  <div class="col-sm-6">
                     <h6 class="media-heading">User Info</h6>
                     <div class="media">
                        <a class="pull-right" href="#">
                           {{HTML::image($user->avatar, $user->firstname, array('class'=>'img-thumbnail','width'=>95));}}
                        </a>

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
            </div>
         </div>
         <hr>
         <div class="row">
            <div class="col-sm-12">
               <div class="row">
                  <div class="col-sm-6">
                     My Organizations
                     <br>
                     <br>
                     <a class="btn btn-embossed btn-sm btn-primary" href="{{ URL::route('dashboard.organization.create') }}">New Organization</a>
                  </div>
               </div>
            </div>
         </div>
         <hr>
         <div class="row">
            <div class="col-sm-12">
               <div class="row">
                  <div class="col-sm-6">
                     Affiliations
                     <br>
                     <br>
                     <a class="btn btn-embossed btn-sm btn-primary" href="{{ URL::route('dashboard.organization.create') }}">Join Organization</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@stop