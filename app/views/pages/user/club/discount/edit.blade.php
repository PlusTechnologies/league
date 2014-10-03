@extends('layouts.dashboard.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <h3 class="">Update discount codes—you have full control over discounts.</h3>
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
                    {{ Form::open(array('action' => array('DiscountController@update',$club->id, $discount->id ),'id'=>'update_discount','method' => 'PUT')) }}
                    <h3 class="">Discount details: {{$discount->name}}</h3>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <small class="help-block">Discount %</small>
                            <div class="input-group">
                                    
                                    {{Form::text('percent', $discount->percent * 100, array('id'=>'percent','class'=>'form-control','placeholder'=>'Percent','tabindex'=>'6')) }}
                                    <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <small class="help-block">Limit</small>
                            <div class="input-group">
                                    {{Form::text('limit', $discount->limit, array('id'=>'limit','class'=>'form-control','placeholder'=>'Max Limit','tabindex'=>'6')) }}
                                    <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <small class="help-block">Valid from:</small>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button class="btn" type="button"><span class="fui-calendar"></span></button>
                                    </span>
                                    {{Form::text('start', $discount->start, array('id'=>'start','class'=>'form-control','placeholder'=>'Valid start date','tabindex'=>'6')) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <small class="help-block">to: </small>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button class="btn" type="button"><span class="fui-calendar"></span></button>
                                    </span>
                                    {{Form::text('end', $discount->end, array('id'=>'end','class'=>'form-control','placeholder'=>'Expiration date','tabindex'=>'6')) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br class="colorgraph">
                    <div class="row">
                         <div class="col-md-4">
                            <button class="btn btn-primary btn-sm btn-block" id="update-discount" type="submit" >Update discount</button>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ URL::action('DiscountController@index', $club->id) }}" class="btn btn-info btn-sm btn-block" >Cancel</a>
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
<script type="text/javascript">
$(window).load(function() {

    var p = $('#percent').val();
    $('#percent').val(p);
    if(p == 0){$('#percent').val(''); }
    $('#percent').mask('00.00', {reverse: true});

    $('.hasDatepicker').each(function() { 

        var dateFormat = $(this).val();
        if(dateFormat){
            var date = new Date(dateFormat); 
            date.setDate(date.getDate() + 1); 
            var dateFormat = $.datepicker.formatDate('MM dd, yy',date);
            $(this).val(dateFormat);
        }
        
    });
});
$(function() {
    $('#update-discount').click(function(event){
        event.preventDefault();
        //clean dates
        var dateTypeVar_start = $('#start').datepicker('getDate');
        $('#start').val($.datepicker.formatDate('yy-mm-dd', dateTypeVar_start));
        var dateTypeVar_end = $('#end').datepicker('getDate');
        $('#end').val($.datepicker.formatDate('yy-mm-dd', dateTypeVar_end));
        $('#percent').val($('#percent').cleanVal());
        $('#limit').val($('#limit').cleanVal());
        //submit form
        $( "#update_discount" ).submit()
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
