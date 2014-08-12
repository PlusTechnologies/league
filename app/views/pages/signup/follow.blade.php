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
          <p>Follow your favorite club and get access to announcements and special promotions</p>
          <hr>
          <form role="form">
            <div class="row">
              <form class="form-inline" role="form">
              <div class="col-sm-8">
                <div class="form-group">
                  <select class="form-control select-block" id="follow-list">
                    <option></option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                  <button type="submit" class="btn btn-primary btn-sm">Follow Club</button>
              </div>
              </form>
            </div>
          </form>
          
          <br>
          <br>

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
@stop
@section('script')
<script type="text/javascript">
$(document).ready(function() {
  $("#follow-list").select2({
    placeholder: "Select a State",
    allowClear: true,
    minimumInputLength: 1
  });

});

</script>
@stop
