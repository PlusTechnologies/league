@extends('layouts.public.default')
@section('content')
<!-- Begin page content -->
<div class="container">
  <div class="row">
    <div class="col-md-7 col-md-offset-1">
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
          <h3>User Profile</h3>
          <hr>
          <div class="row col-md-5 pull-left">
            <div class="col-xs-12 col-sm-4 col-md-3">
              <div class="form-group">
                <label>Profile picture.</label>
                <a href="" data-toggle="modal" data-target="#imagecrop"> <img src="/images/default-avatar.png" class="thumbnail user-pic" width="65"></a>
                <input type="hidden" id="croppic" name="avatar" value="/images/default-avatar.png">
                <input type="hidden" name="type" value="2">
              </div>
            </div>
          </div>
          <div class="row col-md-7 ">
            <div class="col-md-12">
              <div class="form-group">
                <label>Name:</label>
                <a href="" data-toggle="modal" data-target="#imagecrop">Celine J. Landon</a>
              </div>
              <div class="form-group">
                <label>Email:</label>
                <small>land@gmail.com</small>
              </div>
              <div class="form-group">
                <label>Phone:</label>
                <small>(567)-325-4985</small>
              </div>
              <div class="form-group">
                <label>Associated Players:</label>
                <small>James Landon</small> <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <small>Brooklyn Landon</small>
              </div>
              <div class="form-group">
                <label>Club:</label>
                <small>IM Leagues Panthers</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr> 
        <p>
          {{link_to_route('edit_profile', 'Edit Profile', null, ['class'=>'btn btn-lg btn-primary'])}}
          <!-- <button class="btn btn-info " type="submit">Edit Profile</button> -->
        </p>
    </div>
  </div>
</div>
@stop