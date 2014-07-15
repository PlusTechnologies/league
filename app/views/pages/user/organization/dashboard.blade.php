@extends('layouts.dashboard.default')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12 app-frame">
      <div class="row ">
        <div class="col-sm-12 app-title">
          <div class="image"><i class="retinaicon-essentials-006"></i></div>
          <h2 class="text-center">Organization Management</h2>
          <p class="text-center"><small >Take your first step by exploring all the option in our system.</small> </p>
          <a class="btn btn-primary btn-sm" href="/dashboard/organization/create"> Create new organization</a>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">Organization</h4>
            </div>
            <div class="table-responsive">
              <table class="table table-org">
                <thead>
                  <tr>
                    <th></th>
                    <th>Name</th>
                    <th class="hidden-sm hidden-xs">Teams</th>
                    <th class="hidden-sm hidden-xs">Players</th>
                    <th class="hidden-sm hidden-xs">Fans</th>
                    <th>YTD Sales</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($organizations as $organization)
                  <tr>
                    <td class="col-sm-1"><img class="org-logo" src="{{$organization->logo}}"></td>
                    <td class="col-sm-4">{{$organization->name}}</td>
                    <td class="col-sm-1 hidden-sm hidden-xs">8</td>
                    <td class="col-sm-1 hidden-sm hidden-xs">125</td>
                    <td class="col-sm-1 hidden-sm hidden-xs">125</td>
                    <td class="col-sm-2">$923,629</td>
                    <td class="col-sm-2" class="text-right" >
                      <a href="{{URL::action('OrganizationController@show', $organization->id)}}" class="btn btn-xs btn-primary active" role="button">View
                      </a>
                      <a class="btn btn-danger btn-xs" href="#">
                        <i class="fa fa-trash-o"></i>
                      </a>
                      <a class="btn btn-default btn-xs" href="#">
                        <i class="fa fa-cog"></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop