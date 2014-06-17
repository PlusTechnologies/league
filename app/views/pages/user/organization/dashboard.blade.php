@extends('layouts.dashboard.default')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12 app-header">
    </div>  
    <div class="col-sm-12 app-frame">
      <div class="row ">
        <div class="col-sm-12 app-title">
          <div class="image"><i class="fa fa-sitemap"></i></div>
          <h2 class="text-center home-title">Organization Management</h2>
          <p class="text-center"><small >Take your first by exploring all the option in our system.</small> </p>
          <a class="btn btn-primary btn-sm" href="/dashboard/organization/create"> Create new organization</a>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Organization</h3>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-org">
                <thead>
                  <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Teams</th>
                    <th>Players</th>
                    <th>YTD Sales</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @foreach($organizations as $organization)
                    <td class="col-sm-1"><img class="org-logo img-thumbnail" src="{{$organization->logo}}"></td>
                    <td class="col-sm-4">{{$organization->name}}</td>
                    <td class="col-sm-1">8</td>
                    <td class="col-sm-1">125</td>
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
                    @endforeach
                  </tr>
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