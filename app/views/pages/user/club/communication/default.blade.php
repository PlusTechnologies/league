@extends('layouts.dashboard.default')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12 app-frame">
      <div class="row">
        <div class="col-md-6 col-md-push-6">
          <div class="row dynamicHTML" id="dynamicHTML">
          </div>
      </div>
      <div class="col-md-6 col-md-pull-6">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-12">
                <div class="col-md-12">
                  <br>
                  <a  href="{{URL::action('CommunicationController@create', $club->id)}}" id="compose" class="btn btn-primary pull-right">
                    <span class="glyphicon glyphicon-plus"></span> Compose
                  </a>
                  <br>
                  <h3>Sent Messages
                  </h3>
                  <hr>
                </div>
                <!-- Pull Messages into here -->
            </div>
             
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@stop
@section('script')
<script>

</script>
@stop