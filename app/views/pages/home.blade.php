@extends('layouts.default')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
         <div class="col-sm-12">
            <hr>
         </div>
         <div class="col-sm-6 col-sm-offset-3">
         <div class="row">
            <div class="col-sm-12">
               <h3 class="text-center">Sign up</h3>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-12">

               @if(!Auth::check())
                     <a class="btn btn-lg btn-primary" href="{{ URL::route('signup') }}">Create Account</a>
                     <a class="btn btn-lg btn-primary" href="{{ URL::route('login') }}">Login</a> 
                @else
                     <a class="btn btn-lg btn-primary" href="{{ URL::route('logout') }}">Logout</a>
                     <a class="btn btn-lg btn-primary" href="{{ URL::route('dashboard') }}">Open Dashboard</a>
                @endif
               
               {{ Auth::user() }}
            </div>
         </div>
      </div>
      </div>
   </div>
</div>
@stop
