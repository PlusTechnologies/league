@extends('layouts.dashboard.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <hr>
            <h3 class="">New Discount</h3>
            <div class="col-sm-5 clearfix">
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
                    {{ Form::open(array('action' => array('DiscountController@store',$organization->id ),'id'=>'new_discount','method' => 'post')) }}

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <small class="help-block">Discount Code </small>
                            <div class="input-group input-group-sm">
                                {{Form::text('name', '', array('id'=>'name','class'=>'form-control','placeholder'=>'','tabindex'=>'1')) }}
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <small class="help-block">Discount %</small>
                            <div class="input-group input-group-sm">
                                    
                                    {{Form::text('percent', '', array('id'=>'percent','class'=>'form-control','placeholder'=>'','tabindex'=>'6')) }}
                                    <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <small class="help-block">Limit</small>
                            <div class="input-group input-group-sm">
                                    {{Form::text('limit', '', array('id'=>'limit','class'=>'form-control','placeholder'=>'','tabindex'=>'6')) }}
                                    <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <small class="help-block">Valid from:</small>
                            <div class="form-group input-group-sm">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-btn">
                                        <button class="btn" type="button"><span class="fui-calendar"></span></button>
                                    </span>
                                    {{Form::text('start', '', array('id'=>'start','class'=>'form-control','placeholder'=>'Valid start date','tabindex'=>'6')) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <small class="help-block">to: </small>
                            <div class="form-group">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-btn">
                                        <button class="btn" type="button"><span class="fui-calendar"></span></button>
                                    </span>
                                    {{Form::text('end', '', array('id'=>'end','class'=>'form-control','placeholder'=>'Expiration date','tabindex'=>'6')) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br class="colorgraph">
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-primary btn-sm" id="add-discount">Create</button>
                            <a href="{{ URL::action('DiscountController@index', $organization->id) }}" class="btn btn-info btn-sm" >Cancel</a>
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
    $('#add-discount').click(function(event){
        event.preventDefault();
        //clean dates
        var dateTypeVar_start = $('#start').datepicker('getDate');
        $('#start').val($.datepicker.formatDate('yy-mm-dd', dateTypeVar_start));
        var dateTypeVar_end = $('#end').datepicker('getDate');
        $('#end').val($.datepicker.formatDate('yy-mm-dd', dateTypeVar_end));
        $('#percent').val($('#percent').cleanVal()/100);
        $('#limit').val($('#limit').cleanVal());
        //submit form
        $( "#new_discount" ).submit()
    });

    $('#percent').mask('00.00', {reverse: true});
    $('#limit').mask('#####');

    // jQuery UI Datepicker JS init
    var datepickerSelector = '#start, #end';
    $(datepickerSelector).datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        dateFormat: "MM d, yy",
        yearRange: '-3:+3'
    }).prev('.btn').on('click', function (e) {
        e && e.preventDefault();
        $(datepickerSelector).focus();
    });
    // Now let's align datepicker with the prepend button
    $(datepickerSelector).datepicker('widget').css({
        'margin-left': -$(datepickerSelector).prev('.btn').outerWidth() - 49
    });


});
</script>
@stop
