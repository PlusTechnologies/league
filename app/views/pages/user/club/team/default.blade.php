@extends('layouts.dashboard.default')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12 app-frame">
      <div class="row ">
        <div class="col-sm-12 app-title">
          <div class="image"><i class="retinaicon-communication-006"></i></div>
          <h2 class="text-center">Teams</h2>
          <p class="text-center"><small >Create teams and keep track of roster.</small> </p>
          <a class="btn btn-primary btn-sm" href="{{ URL::action('EventoController@create', $club->id) }}"> Create new team</a>
        </div>
      </div>
      <br>
      <br>
      <div class="row">
        <div class="col-md-6">
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label class="col-sm-4"><h4>Select Season</h4></label>
              <div class="col-sm-8">
                <select class="form-control">
                  <option value="1">2015</option>
                  <option value="2">2016</option>
                </select>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title ">
                <div class="row">
                  <div class = "col-md-12">Camps
                    <a class="pull-right" href="{{ URL::action('EventoController@create', $club->id) }}">
                      <i class="fa fa-plus"></i> Create New
                    </a>
                  </div>
                </div> 
              </h3>
            </div>
            <div class="table-responsive">
              
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title ">
                <div class="row">
                  <div class = "col-md-12">Tryouts
                    <a class="pull-right" href="{{ URL::action('EventoController@create', $club->id) }}">
                      <i class="fa fa-plus"></i> Create New
                    </a>
                  </div>
                </div> 
              </h3>
            </div>
            <div class="table-responsive">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12"><br></div>
    </div>
  </div>
</div>
@stop