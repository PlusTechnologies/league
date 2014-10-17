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
          <li>
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
          <li class="selected">
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
          <span class="icon-am retinaicon-communication-006"></span> 
          Players
        </span>
        <div class="section-description">
          <p>Manage your list of players, add, update, edit and modified their profile. </p>
          <a href="{{URL::action('ClubController@followsave')}}" id="cancel" class="btn btn-primary pull-right">Follow Club</a>
        </div>
        <br>
        <br>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                <div class="row">
                  <div class = "col-md-12">
                    Registered Players
                  </div>
                </div> 
              </h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <h3>Players</h3>
                  <hr>
                  @if($players)
                  <div class="row">
                    @foreach ($players as $player) 
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-12 col-sm-2">
                          <figure>
                            <img width="100" class="img img-responsive" alt="" src="{{$player->avatar}}">
                          </figure>
                        </div>
                        <div class="col-xs-12 col-sm-10">
                          <h3>{{$player->firstname}} {{$player->lastname}}</h3>
                          <p><strong>Born: </strong>{{date('M d, Y',strtotime($player->dob));}} <br>
                            <strong>Position: </strong>{{$player->position}} <br>
                            <strong>High School Class: </strong>{{$player->year}}<br>
                            <strong>Relationship: </strong>{{$player->pivot->relation}}
                          </p>
                          <p>
                            {{ Form::open(array('action' => array('PlayerController@destroy', $player->id), 'method' => 'DELETE', 'id'=>'p-delete')) }}
                            <div class="btn-group btn-group-xs">
                              <!-- <button type="button" class="btn btn-primary edit-player" data-id="{{$player->id}}">Edit</button> -->
                              <a  href="{{URL::action('PlayerController@edit', $player->id)}}" id="edit" class="btn btn-primary edit-player">Edit</a>
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                            {{ Form::close() }}
                          </p>
                          <hr> 
                        </div> 
                      </div>
                    </div>
                    @endforeach
                  </div>
                  @endif
                  
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
<div class="modal fade" id="imagecrop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="myModalLabel">Upload profile picture</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div id="upimage"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@stop
@section('script')
<script type="text/javascript">
$(document).ready(function() {
  var cropperOptions = {
    doubleZoomControls:true,
    imgEyecandy:true,
    uploadUrl:'/api/image/upload',
    cropUrl:'/api/image/crop',
    outputUrlId:'croppic',
    onAfterImgUpload:   function(){ console.log(cropperHeader) },
    onAfterImgCrop:     function(){ 
      console.log(cropperHeader['croppedImg']);
      var cropurl = $("#croppic").val();
      $('.user-pic').attr("src", cropurl);
      $(".cropControlRemoveCroppedImage").click(function(){
        $("#croppic").val("/images/default-avatar.png");
        $('.user-pic').attr("src", "/images/default-avatar.png");
      });
    },
    cropData:{
      "url": window.location.origin,
    }
  }
  var cropperHeader = new Croppic('upimage', cropperOptions);
});
</script>
@stop