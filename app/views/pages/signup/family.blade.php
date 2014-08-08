@extends('layouts.public.default')
@section('content')
<div class="container wrapper">
    <div class="row">
        <div class="content-wrap">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="col-sm-8">
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
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Let's get started</h3>
                                <hr>
                                {{ Form::open(array('url' => 'account','id'=>'new_account','method' => 'post', 'files'=>true)) }}
                                <div id="rootwizard">
                                    <ul class="row bs-wizard" style="border-bottom:0;">
                                        <li class="col-xs-3 bs-wizard-step w-first ">
                                            <a class="text-center bs-wizard-stepnum" href="#tab1" data-toggle="tab" >Step 1</a>
                                            <div class="progress"><div class="progress-bar"></div></div>
                                            <a href="#" class="bs-wizard-dot"></a>
                                            <div class="bs-wizard-info text-center"></div>
                                        </li>
                                        <li class="col-xs-3 bs-wizard-step ">
                                            <a class="text-center bs-wizard-stepnum" href="#tab2" data-toggle="tab" >Step 2</a>
                                            <div class="progress"><div class="progress-bar"></div></div>
                                            <a href="#" class="bs-wizard-dot"></a>
                                            <div class="bs-wizard-info text-center"></div>
                                        </li>
                                        <li class="col-xs-3 bs-wizard-step ">
                                            <a class="text-center bs-wizard-stepnum" href="#tab3" data-toggle="tab" >Step 3</a>
                                            <div class="progress"><div class="progress-bar"></div></div>
                                            <a href="#" class="bs-wizard-dot"></a>
                                            <div class="bs-wizard-info text-center"></div>
                                        </li>
                                        <li class="col-xs-3 bs-wizard-step ">
                                            <a class="text-center bs-wizard-stepnum" href="#tab4" data-toggle="tab" >Step 4</a>
                                            <div class="progress"><div class="progress-bar"></div></div>
                                            <a href="#" class="bs-wizard-dot"></a>
                                            <div class="bs-wizard-info text-center"></div>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="tab1">
                                            <p>Account Information</p>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        {{Form::email('email', '', array('id'=>'email','class'=>'form-control','placeholder'=>'Email Address', 'tabindex'=>'4')) }}
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        {{Form::password('password', array('id'=>'password','class'=>'form-control','placeholder'=>'Password', 'tabindex'=>'6')) }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                        {{Form::text('firstname', '', array('id'=>'firstname','class'=>'form-control','placeholder'=>'First Name','tabindex'=>'2')) }}
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                 <div class="form-group">
                                                    <label>mobile</label>
                                                    {{Form::text('mobile', '', array('id'=>'mobile','class'=>'form-control','placeholder'=>'Mobile #', 'tabindex'=>'5')) }}                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label>Profile picture.</label>
                                                    <a href="" data-toggle="modal" data-target="#imagecrop"> <img src="/images/default-avatar.png" class="thumbnail user-pic" width="65"></a>
                                                    <input type="hidden" id="croppic">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <p>Add your players Information 
                                            <a href="#" class="pull-right addplayer">Add New Player</a>
                                        </p>
                                        <div class="player-data"></div>
                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        3
                                    </div>
                                    <div class="tab-pane" id="tab4">
                                        4
                                    </div>
                                </div>
                                <ul class="pagination pagination-success wizard">
                                    <li href="#" class="btn btn-success btn-xs previous first" style="display:none;"> <i class="fui-arrow-left"></i>
                                    </li>
                                    <li href="#" class="btn btn-success btn-xs previous"> <i class="fui-arrow-left"></i>
                                    </li>
                                    <li href="#" class="btn btn-success btn-xs next"><i class="fui-arrow-right"></i>
                                    </li>
                                    <li href="#" class="btn btn-success btn-xs next finish" style="display:none;">Create Account</li>
                                </ul>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="imagecrop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title" id="myModalLabel">Upload profile picture</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="upimage"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@stop
@section('script')
<script type="text/javascript">
$(document).ready(function() {
    $('.addplayer').click(function(e){
        e.preventDefault; 
        $.get("/api/signup/addplayer",function(data){
            $(".player-data").append(data);
        });
    })
    

    $('#rootwizard').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
            return false;
        },

        onTabShow: function(tab, navigation, index) {
            $(".bs-wizard").removeClass('nav-pills');
            $(".bs-wizard").removeClass('nav');
            var $total = navigation.find('.bs-wizard-step').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $('#rootwizard').find('.wizard .next').hide();
                $('#rootwizard').find('.wizard .finish').show();
                $('#rootwizard').find('.wizard .finish').removeClass('disabled');
            } else {
                $('#rootwizard').find('.wizard .next').show();
                $('#rootwizard').find('.wizard .finish').hide();
            }
            if(index == 0) {
                $(".bs-wizard-step").eq(index).addClass("complete");
                //$(".bs-wizard-step .w-first").removeClass("active");
                $(".bs-wizard-step").eq(index).removeClass("disabled");
            }
        },
        onInit:function(tab, navigation, index){
            navigation.find('.bs-wizard-step').addClass( "disabled" );
        },
        onNext:function(tab, navigation, index) {
            var $current = index+1;
            console.log(index);
            $(".bs-wizard-step").eq(index).removeClass("disabled");
            $(".bs-wizard-step").eq(index-1).addClass("complete");
        },
        onPrevious:function(tab, navigation, index) {
            $(".bs-wizard-step").eq(index+1).addClass("disabled");
            $(".bs-wizard-step").eq(index).removeClass("complete");
            $(".bs-wizard-step .w-first").removeClass("active");
        },
    });
$(".bs-wizard .active").addClass('complete');
$(".bs-wizard .active").removeClass('disabled');
    //$(".bs-wizard li").removeClass('active');

    $('#rootwizard .finish').click(function() {
        alert('Finished!, Starting over!');
        $('#rootwizard').find("a[href*='tab1']").trigger('click');
    });
});

var cropperOptions = {
    doubleZoomControls:true,
    imgEyecandy:true,
    uploadUrl:'/api/image/upload',
    cropUrl:'/api/image/crop',
    outputUrlId:'croppic',
    onAfterImgUpload:   function(){ console.log(cropperHeader) },
    onAfterImgCrop:     function(){ 
        console.log(cropperHeader['croppedImg']);
        var cropurl = $("#croppic").val();
        $('.user-pic').attr("src", cropurl);

        $(".cropControlRemoveCroppedImage").click(function(){
            $("#croppic").val("/images/default-avatar.png");
            $('.user-pic').attr("src", "/images/default-avatar.png");
        });

    },
    cropData:{
        "url": window.location.origin,
    }
}

var cropperHeader = new Croppic('upimage', cropperOptions);
</script>
@stop
