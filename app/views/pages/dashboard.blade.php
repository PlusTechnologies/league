@extends('layouts.default')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
         <hr>
         <div class="row">
            <div class="col-sm-12">
               <h4 class="">Profile - 
                  @if($user->type ==1)
                     <span>Club Dashboard</span>
                  @else
                     <span>Player Dashboard</span>
                  @endif 
               </h4>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-12">
               {{HTML::image($user->avatar, $user->firstname, array('class'=>'img-rounded','width'=>155));}}
               <p>{{$user->firstname}} {{$user->lastname}} </p>
               <br>
               @foreach ($user->organizations as $organization)
               <li>{{$organization->name}}</li>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</div>
@stop