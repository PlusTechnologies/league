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
          <h3>Update User Profile</h3>
          <hr>
          {{ Form::open(array('action' => 'UsersController@updateProfile','id'=>'edit_user_account','method' => 'post', 'files'=>true)) }}
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
          <p>
            <button class="btn btn-info update" type="submit">Update Account</button>
          </p>

          {{Form::close()}}
        </div>
      </div>
    </div>
  </div>
</div>
@stop