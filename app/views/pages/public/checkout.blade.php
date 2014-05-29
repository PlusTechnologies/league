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
                    <h4>Checkout</h4>
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

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="media">
                                {{HTML::image($user->avatar, $user->firstname, array('class'=>'img-thumbnail pull-left','width'=>95));}}
                                <div class="media-body">
                                    <p>
                                        <small>
                                            Name: {{$user->firstname}} {{$user->lastname}}
                                            <br>
                                            Email: {{$user->email}}
                                            <br>
                                            Mobile: {{$user->mobile}}
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row">
                
                <div class="col-md-8">
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
                                    <td>{{$item->name}}</td>
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
                                <td>{{money_format("%.2n",Cart::tax())}}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right">Total</td>
                                <td>{{money_format('%.2n',Cart::total())  }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Payment Details
                            </h3>
                            <div class="checkbox pull-right"></div>
                        </div>
                        <div class="panel-body">
                            {{ Form::open(array('action' => 'PaymentController@store','id'=>'pay','method' => 'post')) }}
                                <div class="form-group">
                                    <label for="cardNumber">CARD NUMBER</label>
                                    <div class="input-group">
                                        {{Form::text('card', '', array('id'=>'card','class'=>'form-control','placeholder'=>'Valid Card Number','tabindex'=>'1', 'required', 'autofocus')) }}
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-7 col-md-7">
                                        <div class="form-group">
                                            <label for="expityMonth">EXPIRY DATE</label>
                                            <div class="col-xs-6 col-lg-6 pl-ziro">
                                                {{Form::text('month', '', array('id'=>'month','class'=>'form-control','placeholder'=>'MM','tabindex'=>'2', 'required')) }}
                                            </div>
                                            <div class="col-xs-6 col-lg-6 pl-ziro">
                                                {{Form::text('year', '', array('id'=>'year','class'=>'form-control','placeholder'=>'YY','tabindex'=>'3', 'required')) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-5 col-md-5 pull-right">
                                        <div class="form-group">
                                            <label for="cvCode">
                                                CV CODE
                                            </label>
                                            {{Form::text('cvc', '', array('id'=>'cvc','class'=>'form-control','placeholder'=>'CV','tabindex'=>'4', 'required')) }}
                                        </div>
                                    </div>
                                </div>
                           
                        </div>
                    </div>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active">
                           
                        </li>
                    </ul>
                    <br/>
                    <button class="btn btn-primary btn-block" type="submit">Pay</button>
                     {{ Form::close() }}
                </div>
            </div>
            <hr>
        </div> <!-- End of col-10 -->
    </div>
</div>

@stop