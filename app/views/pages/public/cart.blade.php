@extends('layouts.public.default')
@section('content')
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container relative">
        <a class="navbar-brand-center" href="/">
            <div class="logo" style="background-image: url(http://leaguetogether.dev/images/league-together-logo.svg)"></div>
        </a>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/cart"><i class="cart retinaicon-finance-001"></i><span class="navbar-new">1</span></a></li>
        </ul>
        @if(!Auth::check())
        <a class="navbar-right btn btn-xs btn-primary nav-btn"href="{{ URL::route('signup') }}">Sign up</a>
        <a class="navbar-right btn btn-xs btn-primary nav-btn"href="{{ URL::route('login') }}">Sign in</a>
        @else
        <a class="navbar-right btn btn-xs btn-primary nav-btn"href="{{ URL::route('logout') }}">Logout</a>
        <a class="navbar-right btn btn-xs btn-primary nav-btn"href="{{ URL::route('dashboard') }}">Open Dashboard</a>
        @endif
    </div>
</nav>
<div class="container">
    <div class="maintitle">
        <h4 class="text-center">Shopping Cart</h4>
        <span class="border"></span>
    </div>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
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
            <div class="row">
                <div class="col-sm-12">
                    <a class="btn btn-primary pull-right space-top-2" href="{{URL::action('PaymentController@create')}}">Check out</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop