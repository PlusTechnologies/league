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
          <li class="selected">
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
          <span class="icon-am retinaicon-essentials-007"></span> 
          Profile Settings
        </span>
        <div class="section-description">
          <p>Your profile information will be used in public-facing contexts, like a receipts.</p>
        </div>
        <br>
        <br>
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">
                  <div class="row">
                    <div class = "col-md-12">
                      Payment Methods
                    </div>
                  </div> 
                </h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <h3>Credit Cards</h3>
                    <hr>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">
                  <div class="row">
                    <div class = "col-md-12">
                      Personal Information
                    </div>
                  </div> 
                </h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <h3>Account Information</h3>
                    <hr>
                    {{ Form::open(array('action' => array('UsersController@update', $user->id),'method' => 'PUT')) }}
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                          <label>Email</label>
                          {{Form::email('email', $user->email, array('id'=>'email','class'=>'form-control','placeholder'=>'Email Address', 'tabindex'=>'1')) }}
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                          <label>mobile</label>
                          {{Form::text('mobile', $user->mobile, array('id'=>'mobile','class'=>'form-control','placeholder'=>'Mobile #', 'tabindex'=>'5')) }}
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                          <label>First Name</label>
                          {{Form::text('firstname', $user->firstname, array('id'=>'firstname','class'=>'form-control','placeholder'=>'First Name','tabindex'=>'3')) }}
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                          <label>Last Name</label>
                          {{Form::text('lastname', $user->lastname, array('id'=>'firstname','class'=>'form-control','placeholder'=>'Last Name','tabindex'=>'4')) }}
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group">
                          <label>Profile picture.</label>
                          <a href="" data-toggle="modal" data-target="#imagecrop"> <img src="{{$user->avatar}}" class="thumbnail user-pic" width="65"></a>
                          <input type="hidden" id="croppic" name="avatar" value="{{$user->avatar}}">
                        </div>
                      </div>
                    </div>
                    <hr>
                    <br>
                    <div class="row">
                      <div class="col-xs-12 col-sm-4 col-md-4 col-md-offset-8">
                        <button type="submit" class="btn btn-info  btn-sm btn-block" >Update</button>
                      </div> 
                    </div>
                    {{ Form::close() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">
                  <div class="row">
                    <div class = "col-md-12">
                      Security
                    </div>
                  </div> 
                </h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <h3>Change Password</h3>
                    <hr>
                    {{ Form::open(array('action' => array('UsersController@update', $user->id),'method' => 'PUT')) }}
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                          <label>Old Password</label>
                          {{Form::password('password',array('class'=>'form-control','placeholder'=>'Password', 'tabindex'=>'1')) }}
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                          <label>New Password</label>
                          {{Form::password('password_new',array('class'=>'form-control','placeholder'=>'New Password', 'tabindex'=>'2')) }}
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-sm-4 col-md-4 col-md-offset-8">
                        <button type="submit" class="btn btn-info  btn-sm btn-block">Save</button>
                      </div> 
                    </div>
                    {{ Form::close() }}
                  </div>
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