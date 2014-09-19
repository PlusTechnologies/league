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
          <h3>Create your Club</h3>
          <hr>
          <p><b>Instructions: </b> Please add your club information. The information provided here will be used all through out the app.</p>
          <hr>
          @if($clubs)
          <div class="row">
              @foreach ($clubs as $club) 
              <div class="col-sm-12">
                <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <figure>
                        <img width="100" class="img img-responsive" alt="" src="{{$club->logo}}">
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <h3>{{$club->name}}</h3>
                    <p><strong>Registered: </strong>{{date('M d, Y',strtotime($club->created_at));}} <br>
                      
                    </p>
                    <p>
                    {{ Form::open(array('action' => array('ClubController@destroy', $club->id), 'method' => 'DELETE', 'id'=>'p-delete')) }}
                    <div class="btn-group btn-group-xs">
                        <button type="button" class="btn btn-primary edit-club" data-id="{{$club->id}}">Edit</button>
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
              <a href="#" class="btn btn-info btn-sm btn-block" >Add Club</a>
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
      {{ Form::open(array('route' => 'dashboard.club.store','id'=>'new_club','method' => 'post', 'files'=>true)) }}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div id="upimageclub"></div>
            <input type="hidden" id="croppic" name="logo" value="/images/default-avatar.png">
          </div>
          <div class="col-md-8">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>Club Name</label>
                        {{Form::text('name', '', array('id'=>'name','class'=>'form-control','placeholder'=>'Club Name','tabindex'=>'1')) }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>Contact Phone</label>
                        {{Form::text('phone', '', array('id'=>'mobile','class'=>'form-control','placeholder'=>'Phone', 'tabindex'=>'2')) }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>Contact Email</label>
                        {{Form::text('email', '', array('id'=>'email','class'=>'form-control','placeholder'=>'Email', 'tabindex'=>'2')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8">
                    <div class="form-group">
                        <label>Address</label>
                        {{Form::text('add1', '', array('id'=>'add1','class'=>'form-control','placeholder'=>'Address', 'tabindex'=>'3')) }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>City</label>
                        {{Form::text('city', '', array('id'=>'city','class'=>'form-control','placeholder'=>'City','tabindex'=>'4')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>State</label>
                        <select data-label="State" class="select-block form-control" data-type="text" name="state">
                            <option></option>
                            <option value="AL">Alabama</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>Zip</label>
                        {{Form::text('zip', '', array('id'=>'zip','class'=>'form-control','placeholder'=>'Zip','tabindex'=>'6')) }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>Sport</label>
                        {{Form::select('sport', array(''=>'','1' => 'Lacrosse'), '', array('class'=>'select-block form-control','tabindex'=>'1') ) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>CardFlex Username</label>
                        {{Form::text('cfuser', '', array('id'=>'cfname','class'=>'form-control','placeholder'=>'User Name','tabindex'=>'7')) }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>CardFlex Password</label>
                        {{Form::password('cfpass', array('id'=>'cfpass','class'=>'form-control','placeholder'=>'Password','tabindex'=>'8')) }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Tell us a little bit about your club</label>
                {{Form::textarea('description', null, array('id'=>'description','size' => '30x5','class'=>'form-control','placeholder'=>'Tell us a little bit about the organanization', 'tabindex'=>'7')) }}
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
      {{ Form::open(array('url' => '/clubs/','id'=>'edit_player','method' => 'PUT', 'files'=>true)) }}
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
  $('#description').redactor();

  $(".edit-club").click(function(){
    $.get( "/api/club/"+ $(this).data("id"))
      .done(function( data ) {
      return;
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
  var cropperHeader = new Croppic('upimageclub', cropperOptions);
  var cropperHeader = new Croppic('editimageclub', cropperOptions2);
});
  </script>
  @stop
