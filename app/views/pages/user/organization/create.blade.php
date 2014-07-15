@extends('layouts.dashboard.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <h3 class="">Add your organization—depending on your payment plan you can manage one or organizations.</h3>
            <br>
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
                    {{ Form::open(array('route' => 'dashboard.organization.store','id'=>'new_organization','method' => 'post', 'files'=>true)) }}
                    <h3 class="">Organization details</h3>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
                                <label>Club Name</label>
                                {{Form::text('name', '', array('id'=>'name','class'=>'form-control','placeholder'=>'Orgnization Name','tabindex'=>'1')) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
                                <label>Contact Phone</label>
                                {{Form::text('phone', '', array('id'=>'mobile','class'=>'form-control','placeholder'=>'Phone', 'tabindex'=>'2')) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
                                <label>Contact Email</label>
                                {{Form::text('email', '', array('id'=>'email','class'=>'form-control','placeholder'=>'Email', 'tabindex'=>'2')) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-md-8">
                            <div class="form-group">
                                <label>Address</label>
                                {{Form::text('add1', '', array('id'=>'add1','class'=>'form-control','placeholder'=>'Address', 'tabindex'=>'3')) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
                                <label>City</label>
                                {{Form::text('city', '', array('id'=>'city','class'=>'form-control','placeholder'=>'City','tabindex'=>'4')) }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
                                <label>State</label>
                                <select data-label="State" class="select-block" data-type="text" name="state">
                                    <option></option>
                                    <option value="AL">Alabama</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
                                <label>Zip</label>
                                {{Form::text('zip', '', array('id'=>'zip','class'=>'form-control','placeholder'=>'Zip','tabindex'=>'6')) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
                                <label>Sport</label>
                                {{Form::select('sport', array(''=>'','1' => 'Lacrosse'), '', array('class'=>'select-block','tabindex'=>'1') ) }}
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Tell us a little bit about your club</label>
                        {{Form::textarea('description', null, array('id'=>'description','size' => '30x30','class'=>'form-control','placeholder'=>'Tell us a little bit about the organanization', 'tabindex'=>'7')) }}
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
                                <label>Select your club logo</label>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <span class="btn btn-info btn-file btn-sm btn-block">                        
                                        <span class="fileinput-new">
                                            <span class="fui-upload"></span>  
                                            Attach File
                                        </span>
                                        <span class="fileinput-exists">
                                            <span class="fui-gear"></span>  
                                            Change
                                        </span>
                                        <input type="file" name="logo">
                                    </span>
                                    <span class="fileinput-filename"></span>
                                    <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <br class="colorgraph">

                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <button class="btn btn-primary btn-block" id="register">Create Organization</button>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <a href="{{ URL::action('DashboardController@show') }}" class="btn btn-info btn-block" >Cancel</a>
                        </div>                            
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="col-sm-10 col-sm-offset-1">
            <br>
        </div>
    </div>
</div>
@stop
@section('script')
<script>
$(function()
{
    $('#description').redactor();
    $('#mobile').mask('(000) 000-0000');
});
</script>
@stop