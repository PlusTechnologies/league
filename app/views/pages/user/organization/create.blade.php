@extends('layouts.dashboard.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <hr>
            <h3 class="">New Organization </h3>
            <div class="col-sm-8 clearfix">
                <div class="row">
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
                    
                    {{ Form::open(array('url' => 'organization','id'=>'new_organization','method' => 'post', 'files'=>true)) }}

                    <hr class="colorgraph">
                    <h6>Organization Details</h6>
                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                {{Form::text('name', '', array('id'=>'name','class'=>'form-control','placeholder'=>'Orgnization Name','tabindex'=>'1')) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                {{Form::text('sport', '', array('id'=>'sport','class'=>'form-control','placeholder'=>'Sport', 'tabindex'=>'2')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::text('address', '', array('id'=>'address','class'=>'form-control','placeholder'=>'Address', 'tabindex'=>'3')) }}
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                {{Form::text('city', '', array('id'=>'city','class'=>'form-control','placeholder'=>'City','tabindex'=>'4')) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <div class="form-group">
                                {{Form::text('state', '', array('id'=>'state','class'=>'form-control','placeholder'=>'State', 'tabindex'=>'5')) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3">
                             <div class="form-group">
                                {{Form::text('zip', '', array('id'=>'zip','class'=>'form-control','placeholder'=>'Zip','tabindex'=>'6')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                                {{Form::textarea('description', '', array('id'=>'description','class'=>'form-control ','placeholder'=>'Tell us a little bit about the organanization', 'tabindex'=>'7')) }}
                            </div>

                    <div class="form-group">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <span class="btn btn-primary btn-embossed btn-file btn-sm">                        
                                <span class="fileinput-new">
                                    <span class="fui-upload"></span>  
                                    Attach File
                                </span>
                                <span class="fileinput-exists">
                                    <span class="fui-gear"></span>  
                                    Change
                                </span>
                                <input type="file" name="avatar">
                            </span>
                            <span class="fileinput-filename"></span>
                            <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×
                            </a>
                        </div>
                        <small><span class="text-muted">Select your organization logo.</span></small>
                    </div>

                    <br class="colorgraph">
                    <div class="row">
                      <div class="col-sm-12">
                        <button class="btn btn-primary btn-embossed btn-sm" id="register">Create</button>
                        <a href="{{ URL::route('dashboard') }}" class="btn btn-info btn-embossed btn-sm" >Cancel</a>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <div class="col-sm-10 col-sm-offset-1">
        <hr>
    </div>
</div>
</div>
</div>
@stop