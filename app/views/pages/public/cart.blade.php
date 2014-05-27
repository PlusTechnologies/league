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
                                                    <th class="hidden-xs">Item</th>
                                                    <th>Description</th>
                                                    <th class="hidden-xs">Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @for($i=0;$i<count(Session::get('order.item')) ;$i++)
                                                
                                                <tr>
                                                    <td class="image hidden-xs">
                                                       {{Session::get('order.item')[$i]['event']}}
                                                    </td>
                                                    <td class="details">
                                                        <div class="clearfix">
                                                            <div class="pull-left no-float-xs">
                                                                <a class="title" href="#"></a>
                                                                <div class="rating">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star disabled"></i>
                                                                    <i class="fa fa-star disabled"></i>
                                                                </div>
                                                            </div>
                                                            <div class="action pull-right no-float-xs">
                                                                <div class="clearfix">
                                                                    <button class="edit"><i class="fa fa-pencil"></i></button>
                                                                    <button class="refresh"><i class="fa fa-refresh"></i></button>
                                                                    
                                        {{ Form::open(array('action' => array('PaymentController@removefromcart'),'method' => 'post')) }}
                                        {{ Form::hidden('index', $i) }}
                                        <button class="delete"><i class="fa fa-trash-o"></i></button> 
                                        {{ Form::close() }}
                                                                      
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="total-price"><span class="currency">$</span>1500.00</td>
                                                </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                        <!-- /Cart Contents -->

                                        <table class="table table-bordered">
                                            <tbody><tr>
                                                <td class="terms">  
                                                    <h5><i class="fa fa-info-circle"></i> our return policy</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                                </td>
                                                <td class="totals"> 
                                                    <table class="cart-totals">
                                                        <tbody><tr>
                                                            <td>Sub Total</td>
                                                            <td class="price">$ 4500.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Service Fee</td>
                                                            <td class="price">$ 500.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Taxes</td>
                                                            <td class="price">$ 250.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cart-total">Total</td>
                                                            <td class="cart-total price">$ 5250.00</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table> 
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
            <button class="btn btn-success pull-right">Pay Now</button>
        </div>
    </div>
    <hr>
</div>
</div>
</div>
@stop