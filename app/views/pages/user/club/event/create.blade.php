@extends('layouts.dashboard.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <h3 class="">Create camps and tryout events—experience how simple it is to track of participants.</h3>
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
                    {{ Form::open(array('action' => array('EventoController@show', $club->id),'id'=>'new_event','method' => 'post')) }}
                    <h3 class="">Event details</h3>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Event Name</label>
                                {{Form::text('name', '', array('id'=>'name','class'=>'form-control','placeholder'=>'Event Name','tabindex'=>'1')) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <div class="form-group">
                                <label>Player Fee</label>
                                {{Form::text('fee', '', array('id'=>'fee','class'=>'form-control','placeholder'=>'Player fee','tabindex'=>'4')) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <div class="form-group">
                                <label>Team fee</label>
                                {{Form::text('fee_group', '', array('id'=>'fee_group','class'=>'form-control','placeholder'=>'Team fee','tabindex'=>'4')) }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-mm-6">
                            <div class="form-group">
                                <label>Address</label>
                                {{Form::text('location', '', array('id'=>'location','class'=>'form-control','placeholder'=>'Address', 'tabindex'=>'3')) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <div class="form-group">
                                <label>Type</label>
                                {{Form::select('type', array('1' => 'Camp', '2' => 'Tryout'), '1', array('class'=>'select-block','tabindex'=>'1') ) }}
                            </div>
                        </div>
                    </div>
                        <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
                                <label>Event Date</label>
                                <div class="input-group">

                                    <span class="input-group-btn">
                                        <button class="btn" type="button"><span class="fui-calendar"></span></button>
                                    </span>

                                    {{Form::text('start', '', array('id'=>'start','class'=>'form-control','placeholder'=>'Event date','tabindex'=>'6')) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
                               <label>Event end date</label>
                               <div class="input-group">

                                <span class="input-group-btn">
                                    <button class="btn" type="button"><span class="fui-calendar"></span></button>
                                </span>

                                {{Form::text('end', '', array('id'=>'end','class'=>'form-control','placeholder'=>'End date','tabindex'=>'6')) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group">
                           <label>Status Open</label>
                           <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn" type="button"><span class="fui-calendar"></span></button>
                            </span>
                            {{Form::text('open', '', array('id'=>'open','class'=>'form-control','placeholder'=>'Open registration','tabindex'=>'6')) }}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>Status Closed</label>
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
               <div class="col-xs-12 col-sm-4 col-md-4">
                <button class="btn btn-primary btn-block" id="add-event">Create</button>
               </div>
               <div class="col-xs-12 col-sm-4 col-md-4">
                <a href="{{ URL::action('ClubController@show', $club->id) }}" class="btn btn-info btn-block" >Cancel</a>
               </div>
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
$('#description').redactor();

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
    $('#add-discount').click(function(event){
        event.preventDefault();
        //clean dates
        var dateTypeVar_start = $('#start').datepicker('getDate');
        $('#start').val($.datepicker.formatDate('yy-mm-dd', dateTypeVar_start));
        var dateTypeVar_end = $('#end').datepicker('getDate');
        $('#end').val($.datepicker.formatDate('yy-mm-dd', dateTypeVar_end));
        $('#percent').val($('#percent').cleanVal());
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

$(function() {
    $('#add-event').click(function(event){
        event.preventDefault();
        //clean dates
        var dateTypeVar_start = $('#start').datepicker('getDate');
        $('#start').val($.datepicker.formatDate('yy-mm-dd', dateTypeVar_start));
        var dateTypeVar_end = $('#end').datepicker('getDate');
        $('#end').val($.datepicker.formatDate('yy-mm-dd', dateTypeVar_end));
        var dateTypeVar_open = $('#open').datepicker('getDate');
        $('#open').val($.datepicker.formatDate('yy-mm-dd', dateTypeVar_open));
        var dateTypeVar_close = $('#close').datepicker('getDate');
        $('#close').val($.datepicker.formatDate('yy-mm-dd', dateTypeVar_close));
        //clean amount 
        $("#fee").val($("#fee").maskMoney('unmasked')[0]);
        $("#fee_group").val($("#fee_group").maskMoney('unmasked')[0]);
        //submit form
        $( "#new_event" ).submit()
    });

    $("#fee, #fee_group").maskMoney({thousands:',', decimal:'.', allowZero:true, prefix:'USD$ ',});
    // jQuery UI Datepicker JS init
    var datepickerSelector = '#start, #end, #open, #close';
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
    $(datepickerSelector).datepicker('widget').css({'margin-left': -$(datepickerSelector).prev('.btn').outerWidth() - 49});
});


</script>
@stop