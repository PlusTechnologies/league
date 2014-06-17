@extends('layouts.public.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="row">
                <div class="col-sm-12">

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <h4>Shopping Cart </h4>
                    @if(Session::has('message'))
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="alert alert-warning alert-dismissable">
                                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                                    {{ Session::get('message') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        Items
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <!-- Cart Contents -->


                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Description</th>
                                                    <th>Qty</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($products as $item)
                                                <tr>
                                                    <td class="details">
                                                        <div class="clearfix">
                                                            <a class="delete btn pull-right btn-danger btn-xs" href="{{URL::action('PaymentController@removefromcart', array($item->identifier))}}"><i class="fa fa-trash-o"></i>
                                                            </a>
                                                            <div class="pull-left no-float-xs">
                                                                <a class="title" href="{{URL::action('EventoController@publico', array($item->event))}}">{{$item->name}}
                                                                </a>

                                                                {{ Cart::has($item->id)}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">{{$item->quantity}}</td>
                                                    <td>{{money_format('%.2n',$item->price)  }}</td>
                                                </tr>
                                                @endforeach

                                                <tr>
                                                    <td colspan="2" class="text-right">Subtotal</td>
                                                    <td>{{money_format("%.2n",Cart::total(false))  }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="text-right">Service Fee</td>
                                                    <td>{{money_format("%.2n",$service_fee)}}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="text-right">Total</td>
                                                    <td>{{money_format('%.2n',$cart_total)  }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- /Cart Contents -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <a class="btn btn-success pull-right" href="{{URL::action('PaymentController@create')}}">Check out</a>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
@stop