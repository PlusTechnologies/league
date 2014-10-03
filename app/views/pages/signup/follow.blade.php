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
          <h3>Follow your favorite club</h3>
          <hr>
          <p>Follow your favorite club and get access to announcements, events, and special promotions</p>
          <hr>
            {{ Form::open(array('action' => 'ClubController@followsave', 'method' => 'post')) }}
            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <select class="form-control select-block" id="follow-list" name="club">
                    <option></option>
                    @if($clubs)
                      @foreach ($clubs as $club) 
                        <option value="{{$club->id}}">
                          {{$club->name}} - {{$club->city}}, {{$club->state}}
                        </option>
                      @endforeach
                    @endif
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                  <button type="submit" class="btn btn-primary btn-sm">Follow Club</button>
              </div>
            </div>
            {{ Form::close() }}
          
          <br>
          <br>

          @if($followers)
          <div class="row">
              @foreach ($followers as $follower) 
              <div class="col-sm-12">
                <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <figure>
                        <img width="100" class="img img-responsive" alt="" src="{{$follower->logo}}">
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <h3>{{$follower->name}} </h3>
                    <p><b>Location:</b> {{$follower->city}}, {{$follower->state}} <br>
                      <b>Contact:</b> {{$follower->email}}
                    </p>
                    <p>
                    {{ Form::open(array('action' => array('ClubController@unfollow', $follower->id), 'method' => 'DELETE', 'id'=>'p-delete')) }}
                    <div class="btn-group btn-group-xs">
                        <button type="submit" class="btn btn-danger">Unfollow</button>
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
            </div> 
            <div class="col-xs-12 col-sm-4 col-md-4">
              @if($followers)
                <a href="/login" class="btn btn-primary btn-sm btn-block" href="#">Finish
                  <i class="fa fa-arrow-right"></i>
                </a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
@section('script')
<script type="text/javascript">
$(document).ready(function() {
  $("#follow-list").select2({
    placeholder: "Select a Club",
    allowClear: true,
    minimumInputLength: 1
  });

});

</script>
@stop
