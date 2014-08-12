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
          <h3>Add players to your account</h3>
          <hr>
          <p><b>Instructions: </b> Please add all the players that you will be responsable for. To add a new player click the "Add new player" button.</p>
          <p>In order to sign in you will need to have at least one player registered under your account. After you are done adding player, click the finish button</p>
          <hr>
          @if($players)
          <div class="row">
              @foreach ($players as $player) 
              <div class="col-sm-12">
                <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <figure>
                        <img width="100" class="img img-responsive" alt="" src="{{$player->avatar}}">
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <h3>{{$player->firstname}} {{$player->lastname}}</h3>
                    <p><strong>Born: </strong>{{date('M d, Y',strtotime($player->dob));}} <br>
                      <strong>Position: </strong>{{$player->position}} <br>
                      <strong>High School Class: </strong>{{$player->year}}<br>
                      <strong>Relationship: </strong>{{$player->pivot->relation}}
                    </p>
                    <p>
                    {{ Form::open(array('action' => array('PlayerController@destroy', $player->id), 'method' => 'DELETE', 'id'=>'p-delete')) }}
                    <div class="btn-group btn-group-xs">
                        <button type="button" class="btn btn-primary edit-player" data-id="{{$player->id}}">Edit</button>
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

          <br>
          <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-md-offset-4" data-toggle="modal" data-target="#addplayer">
              <a href="#" class="btn btn-info btn-sm btn-block" >Add New Player</a>
            </div> 
            <div class="col-xs-12 col-sm-4 col-md-4">
              <button  type="submit"class="btn btn-primary btn-sm btn-block" href="#">Finish
                <i class="fa fa-arrow-right"></i>
              </button>
            </div>
          </div>
        </div>
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
      {{ Form::open(array('action' => 'PlayerController@store','id'=>'new_account','method' => 'post', 'files'=>true)) }}
      <div class="modal-body">
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
                    {{Form::text('firstname', '', array('id'=>'firstname','class'=>'form-control input-sm','placeholder'=>'First Name','tabindex'=>'1')) }}
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">Last Name</label>
                    {{Form::text('lastname', '', array('id'=>'lastname','class'=>'form-control input-sm','placeholder'=>'Last Name','tabindex'=>'2')) }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">Date of Birth</label>
                    {{Form::text('dob', '', array('id'=>'dob','class'=>'form-control input-sm','placeholder'=>'DOB','tabindex'=>'3')) }}
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">Position</label>
                    {{Form::text('position', '', array('id'=>'position','class'=>'form-control input-sm','placeholder'=>'Position','tabindex'=>'4')) }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class=" control-label">Gender</label>
                    {{Form::select('gender', array(''=>'','M' => 'Boy', 'F' => 'Girl'), '', array('class'=>'select-block','tabindex'=>'5') ) }}
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">High School Class</label>
                    {{Form::text('year', '', array('id'=>'grad','class'=>'form-control input-sm','placeholder'=>'Graduation year','tabindex'=>'6')) }}
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
                    {{Form::select('relation', array(''=>'Select Relationship','Mother' => 'Mother', 'Father' => 'Father','Legal Guardian'=>'Legal Guardian','Personal Assistant'=>'Personal Assistant'), '', array('class'=>'select-block','tabindex'=>'5') ) }}
                  </div>
                </div>
              </div> 
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-md-offset-8">
              <button type="submit" class="btn btn-info btn-block" >Save</button>
            </div> 
          </div>
      </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
<div class="modal fade" id="editplayer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="myModalLabel">Edit players</h3>
      </div>
      {{ Form::open(array('url' => '/players/','id'=>'edit_player','method' => 'PUT', 'files'=>true)) }}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div id="editimageplayer">
            </div>
            <input type="hidden" id="croppic-edit" name="avatar" value="/images/default-avatar.png">
          </div>
          <div class="col-md-8">
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">First Name</label>
                    {{Form::text('firstname', '', array('id'=>'firstname-edit','class'=>'form-control input-sm','placeholder'=>'First Name','tabindex'=>'1')) }}
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">Last Name</label>
                    {{Form::text('lastname', '', array('id'=>'lastname-edit','class'=>'form-control input-sm','placeholder'=>'Last Name','tabindex'=>'2')) }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">Date of Birth</label>
                    {{Form::text('dob', '', array('id'=>'dob-edit','class'=>'form-control input-sm','placeholder'=>'DOB','tabindex'=>'3')) }}
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">Position</label>
                    {{Form::text('position', '', array('id'=>'position-edit','class'=>'form-control input-sm','placeholder'=>'Position','tabindex'=>'4')) }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class=" control-label">Gender</label>
                    {{Form::select('gender', array(''=>'','M' => 'Boy', 'F' => 'Girl'), '', array('id'=>'gender-edit','class'=>'select-block','tabindex'=>'5') ) }}
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">High School Class</label>
                    {{Form::text('year', '', array('id'=>'grad-edit','class'=>'form-control input-sm','placeholder'=>'Graduation year','tabindex'=>'6')) }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">US Lacrosse ID</label>
                    {{Form::text('laxid', '', array('id'=>'lax-edit','class'=>'form-control input-sm','placeholder'=>'US Lacross','tabindex'=>'7')) }}
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">You are the player's?</label>
                    {{Form::select('relation', array(''=>'Select Relationship','Mother' => 'Mother', 'Father' => 'Father','Legal Guardian'=>'Legal Guardian','Personal Assistant'=>'Personal Assistant'), '', array('id'=>'relation-edit','class'=>'select-block','tabindex'=>'5') ) }}
                  </div>
                </div>
              </div> 
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-md-offset-8">
              <button type="submit" class="btn btn-info btn-block" >Save</button>
            </div> 
          </div>
      </div>
      {{ Form::close() }}
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
