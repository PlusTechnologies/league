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
        @if($playerinfo)
        <div class="col-md-12">
          {{ Form::open(array('action' => 'PlayerController@store','id'=>'new_account','method' => 'post', 'files'=>true)) }}
          <div class="panel-body">
            <div class="row">
              <div class="col-md-4">
                <div id="upimageplayer"></div>
                <input type="hidden" id="croppic" name="avatar" value="/images/default-avatar.png">
              </div>
              <div class="col-md-8">
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label class="control-label">First Name</label>
                      {{Form::text('firstname', $playerinfo->firstname , array('id'=>'firstname','class'=>'form-control input-sm','placeholder'=>'First Name','tabindex'=>'1')) }}
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label class="control-label">Last Name</label>
                      {{Form::text('lastname', $playerinfo->lastname, array('id'=>'lastname','class'=>'form-control input-sm','placeholder'=>'Last Name','tabindex'=>'2')) }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label class="control-label">Date of Birth</label>
                      {{Form::text('dob', $playerinfo->dob, array('id'=>'dob','class'=>'form-control input-sm','placeholder'=>'DOB','tabindex'=>'3')) }}
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label class="control-label">Position</label>
                      {{Form::text('position', $playerinfo->position, array('id'=>'position','class'=>'form-control input-sm','placeholder'=>'Position','tabindex'=>'4')) }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label class=" control-label">Gender</label>
                      {{Form::select('gender', array(''=>'','M' => 'Boy', 'F' => 'Girl'), $playerinfo->gender, array('class'=>'select-block selectpicker','tabindex'=>'5') ) }}
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label class="control-label">High School Class</label>
                      {{Form::text('year', $playerinfo->year, array('id'=>'grad','class'=>'form-control input-sm','placeholder'=>'Graduation year','tabindex'=>'6')) }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label class="control-label">US Lacrosse ID</label>
                      {{Form::text('laxid', '', array('id'=>'lax','class'=>'form-control input-sm','placeholder'=>'US Lacross','tabindex'=>'7')) }}
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label class="control-label">You are the player's?</label>
                      {{Form::select('relation', array(''=>'Select Relationship','Mother' => 'Mother', 'Father' => 'Father','Legal Guardian'=>'Legal Guardian','Personal Assistant'=>'Personal Assistant'), '', array('class'=>'select-block selectpicker','tabindex'=>'5') ) }}
                    </div>
                  </div>
                </div> 
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Information</button>
          </div>
          {{ Form::close() }}
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@stop
@section('script')
<script type="text/javascript">
$(document).ready(function() {
  $(".edit-player").click(function(){
    $.get( "/api/player/"+ $(this).data("id"))
      .done(function( data ) {
      $("#firstname-edit").val(data.firstname);
      $("#lastname-edit").val(data.lastname);
      $("#dob-edit").val(data.dob);
      $("#position-edit").val(data.position);
      $("#grad-edit").val(data.year);
      $("#lax-edit").val(data.laxid);
      $("#croppic-edit").val(data.avatar);
      $("#gender-edit").val(data.gender);
      $("#relation-edit").val(data.pivot.relation);
      // $("#gender-edit option").removeAttr( "selected" );
      // $("#gender-edit option[value="+data.gender+"]").attr('selected','selected');
      // $("#relation-edit  option").removeAttr( "selected" );
      // $("#relation-edit option[value=\""+data.pivot.relation+"\"]").attr('selected','selected');      
      $('#editimageplayer').css("background-image", "url(" +data.avatar+")");
      $('#edit_player').attr('action',"/players/"+data.id); 
    });
    $('#editplayer').modal('toggle')
  })

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
  var cropperOptions2 = {
    doubleZoomControls:true,
    imgEyecandy:true,
    uploadUrl:'/api/image/upload',
    cropUrl:'/api/image/crop',
    outputUrlId:'croppic-edit',
    onAfterImgUpload:   function(){ console.log(cropperHeader) },
    onAfterImgCrop:     function(){ 
      console.log(cropperHeader['croppedImg']);
      $(".cropControlRemoveCroppedImage").click(function(){
        $("#croppic-edit").val("/images/default-avatar.png");
      });
    },
    cropData:{
      "url": window.location.origin,
    }
  }
  var cropperHeader = new Croppic('upimageplayer', cropperOptions);
  var cropperHeader = new Croppic('editimageplayer', cropperOptions2);
});
  </script>
  @stop
