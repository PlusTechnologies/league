@extends('layouts.public.default')
@section('content')
<!-- Begin page content -->
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-1">
      @if($errors->has())
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <div class="alert alert-warning alert-dismissable">
              <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
              <ul>
                @foreach ($errors->all() as $error) 
                <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
      @endif
      <div class="row">
        <div class="col-md-12">
          <h3>Parent/Family or Legal Guardian</h3>
          <hr>
          {{ Form::open(array('action' => 'UsersController@create','id'=>'new_account','method' => 'post', 'files'=>true)) }}
          <p>Personal Account Information</p>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <label>Email</label>
                {{Form::email('email', '', array('id'=>'email','class'=>'form-control','placeholder'=>'Email Address', 'tabindex'=>'1')) }}
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <label>Password</label>
                {{Form::password('password', array('id'=>'password','class'=>'form-control','placeholder'=>'Password', 'tabindex'=>'2')) }}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4">
              <div class="form-group">
                <label>First Name</label>
                {{Form::text('firstname', '', array('id'=>'firstname','class'=>'form-control','placeholder'=>'First Name','tabindex'=>'3')) }}
              </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
              <div class="form-group">
                <label>Last Name</label>
                {{Form::text('lastname', '', array('id'=>'firstname','class'=>'form-control','placeholder'=>'Last Name','tabindex'=>'4')) }}
              </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
              <div class="form-group">
                <label>mobile</label>
                {{Form::text('mobile', '', array('id'=>'mobile','class'=>'form-control','placeholder'=>'Mobile #', 'tabindex'=>'5')) }}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4">
              <div class="form-group">
                <label>Profile picture.</label>
                <a href="" data-toggle="modal" data-target="#imagecrop"> <img src="/images/default-avatar.png" class="thumbnail user-pic" width="65"></a>
                <input type="hidden" id="croppic" name="avatar" value="/images/default-avatar.png">
                <input type="hidden" name="type" value="2">
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
              <div class="col-xs-4 col-sm-3 col-md-3">
                  <span class="button-checkbox">
                      <button type="button" class="btn btn-xs" data-color="info" tabindex="7">
                          I Agree
                      </button>
                      {{Form::checkbox('agreement', '1',false, array('id'=>'agreement','class'=>'hidden', 'name'=>'agreement')) }}
                  </span>
              </div>
              <div class="col-xs-8 col-sm-9 col-md-9">
                  <p>By clicking <strong>"I Agree"</strong>, you accept the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.</p>
              </div>
          </div>
          <br>
          <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-md-offset-4">
              <a href="{{ URL::route('login') }}" class="btn btn-info  btn-sm btn-block" >Sign In</a>
            </div> 
            <div class="col-xs-12 col-sm-4 col-md-4 ">
              <button  type="submit"class="btn btn-primary btn-sm btn-block" href="#">Next
                <i class="fa fa-arrow-right"></i>
              </button>
            </div>
          </div>
          {{ Form::close() }}
        </div>
      </div>
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
<div class="modal fade" id="addplayer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="myModalLabel">Add players</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div id="upimageplayer"></div>
          </div>
          <div class="col-md-8">
            <form role="form">
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">First Name</label>
                    {{Form::text('name[]', '', array('id'=>'firstname','class'=>'form-control input-sm','placeholder'=>'First Name','tabindex'=>'2')) }}
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">Last Name</label>
                    {{Form::text('name[]', '', array('id'=>'lastname','class'=>'form-control input-sm','placeholder'=>'First Name','tabindex'=>'2')) }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">Date of Birth</label>
                    {{Form::text('dob[]', '', array('id'=>'firstname','class'=>'form-control input-sm','placeholder'=>'First Name','tabindex'=>'2')) }}
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">Position</label>
                    {{Form::text('position[]', '', array('id'=>'firstname','class'=>'form-control input-sm','placeholder'=>'First Name','tabindex'=>'2')) }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class=" control-label">Gender</label>
                    {{Form::text('gender[]', '', array('id'=>'firstname','class'=>'form-control input-sm','placeholder'=>'First Name','tabindex'=>'2')) }}
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">Graduation Year</label>
                    {{Form::text('year[]', '', array('id'=>'firstname','class'=>'form-control input-sm','placeholder'=>'First Name','tabindex'=>'2')) }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">US Lacrosse ID</label>
                    {{Form::text('laxid[]', '', array('id'=>'firstname','class'=>'form-control input-sm','placeholder'=>'First Name','tabindex'=>'2')) }}
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                </div>
              </div> 
            </form>
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
