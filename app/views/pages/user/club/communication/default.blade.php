@extends('layouts.dashboard.default')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12 app-frame">
      <div class="row">
        <div class="col-md-7 col-md-push-5">
          <div class="row">
            <div class="col-md-12">
                <div>
                  <h2>
                    New Message
                  </h2>
                  <hr>
                </div>
                  {{Form::open()}}
                    <div class="col-xs-12">
                      <div class="form-group">
                        <label>To</label>
                        {{ Form::text('send_to', '', array('id'=>'to', 'class' => 'form-control', 'tabindex'=>'1')) }}
                      </div>
                    </div>
                    <div class="col-xs-12">
                      <div class="form-group">
                        <label>Message</label>
                        {{Form::textArea('message', '', array('id'=>'message','class'=>'form-control', 'tabindex'=>'2')) }}
                      </div>
                    </div>
                    <div class="col-xs-8">
                      <div class="form-group">
                        <div class="col-xs-3">
                          <div class="row">
                          <div class="form-group">
                            <button type="submit" id="send" class="btn btn-primary">Send</button>
                          </div>
                          <div class="form-group">
                            <button type="submit" id="cancel" class="btn btn-default">Cancel</button>
                          </div>
                        </div>
                        </div>
                      </div>
                    </div>
                  {{Form::close()}}
            </div>
          </div>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                  <br>
                  <a href="#" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span> Compose</a>
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
@stop
@section('script')
<script>
$(function() {
  $( ".datepicker" ).datepicker();
});
</script>
@stop