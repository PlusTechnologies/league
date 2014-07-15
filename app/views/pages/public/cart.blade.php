@extends('layouts.public.default')
@section('content')
<div class="container">
    <div class="maintitle">
        <h4 class="text-center">Shopping Cart</h4>
        <span class="border"></span>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
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
            <div class="row">
                <div class="col-sm-12">
                    <div class="widget space-top-2">
                        <div class="bg-color default">
                            <h4 class="widget-title">Items</h4>
                        </div>
                        <div class="bg-color white">
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
                                            <td class="text-center">
                                                <input type="text" id="spinner-05" value="{{$item->quantity}}" class="form-control input-sm spinner" />
                                            </td>
                                            <td>{{money_format('%.2n',$item->price)  }}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2" class="text-right">Subtotal</td>
                                            <td>{{money_format("%.2n",Cart::total(false))  }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-right">Taxes and Fees</td>
                                            <td>{{money_format("%.2n",$tax + $service_fee)}}</td>
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
            <div class="row">
                <div class="col-sm-12 text-right">
                    <a class="btn btn-sm btn-primary space-top-2" href="">Update</a>
                    <a class="btn btn-sm btn-primary space-top-2" href="{{URL::action('PaymentController@create')}}">Check out</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop