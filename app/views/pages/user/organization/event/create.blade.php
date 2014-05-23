@extends('layouts.dashboard.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <hr>
            <h3 class="">New Event </h3>
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

                    {{ Form::open(array('action' => array('EventController@show', $organization->id),'id'=>'new_event','method' => 'post')) }}

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                {{Form::text('name', '', array('id'=>'name','class'=>'form-control','placeholder'=>'Event Name','tabindex'=>'1')) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                {{Form::select('type', array('1' => 'Camp', '2' => 'Tryout'), '1', array('class'=>'select-block','tabindex'=>'1') ) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::text('location', '', array('id'=>'location','class'=>'form-control','placeholder'=>'Location', 'tabindex'=>'3')) }}
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <small class="help-block">Player fee</small>
                                {{Form::text('fee', '', array('id'=>'fee','class'=>'form-control','placeholder'=>'Player fee','tabindex'=>'4')) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <small class="help-block">Team fee</small>
                                {{Form::text('fee_group', '', array('id'=>'fee_group','class'=>'form-control','placeholder'=>'Team fee','tabindex'=>'4')) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <small class="help-block">Event date</small>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button class="btn" type="button"><span class="fui-calendar"></span></button>
                                    </span>
                                    {{Form::text('start', '', array('id'=>'start','class'=>'form-control','placeholder'=>'Event date','tabindex'=>'6')) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <small class="help-block">End date</small>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button class="btn" type="button"><span class="fui-calendar"></span></button>
                                    </span>
                                    {{Form::text('end', '', array('id'=>'end','class'=>'form-control','placeholder'=>'End date','tabindex'=>'6')) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <small class="help-block">Open Registration</small>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button class="btn" type="button"><span class="fui-calendar"></span></button>
                                    </span>
                                    {{Form::text('open', '', array('id'=>'open','class'=>'form-control','placeholder'=>'Open registration','tabindex'=>'6')) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <small class="help-block">Close Registration</small>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button class="btn" type="button"><span class="fui-calendar"></span></button>
                                    </span>
                                    {{Form::text('close', '', array('id'=>'close','class'=>'form-control','placeholder'=>'Close registration','tabindex'=>'6')) }}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        {{Form::textarea('description', null, array('id'=>'description','size' => '30x4','class'=>'form-control','placeholder'=>'Event instructions', 'tabindex'=>'7')) }}
                    </div>

                    <br class="colorgraph">
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-primary btn-embossed" id="register">Create</button>
                            <a href="{{ URL::action('OrganizationController@show', $organization->id) }}" class="btn btn-info btn-embossed" >Cancel</a>
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
@section('script')
<script type="text/javascript">

$(function() {

    $("#fee, #fee_group").maskMoney({thousands:',', decimal:'.', allowZero:true, prefix:'USD$ ',});
    // jQuery UI Datepicker JS init
    var datepickerSelector = '#start, #end, #open, #close';
    $(datepickerSelector).datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        dateFormat: "d MM, yy",
        yearRange: '-3:+3'
    }).prev('.btn').on('click', function (e) {
        e && e.preventDefault();
        $(datepickerSelector).focus();
    });
    // Now let's align datepicker with the prepend button
    $(datepickerSelector).datepicker('widget').css({'margin-left': -$(datepickerSelector).prev('.btn').outerWidth() - 49});

});
</script>
@stop
