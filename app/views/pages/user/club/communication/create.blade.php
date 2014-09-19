@extends('layouts.dashboard.default')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12 app-frame">
      <div class="row">
        <div class="col-md-6 col-md-push-6">
          <div class="row dynamicHTML" id="dynamicHTML">
            <div class="col-md-12">
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

              @if(Session::has('messages'))
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <div class="alert alert-info alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                          <h4>{{ Session::get('messages') }}</h4>
                      </div>
                    </div>
                  </div>
              </div>  
              @endif
              <div>
                <h2>
                  New Message
                </h2>
                <hr>
              </div>
              {{Form::open(array('action' => array('CommunicationController@store', $club->id),'id'=>'send_communication','method' => 'post', 'files'=>true))}}
              <div class="col-xs-12">
                <div class="form-group">
                  <label>To</label>
                  {{ Form::select('recepient', array('1' => 'All Fans', '2' => 'All Parents'),'', array('id'=>'to','tabindex'=>'1'));}}
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
                        <a href="{{URL::action('CommunicationController@index', $club->id)}}" id="cancel" class="btn btn-default">Cancel</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {{Form::close()}}
            </div>
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