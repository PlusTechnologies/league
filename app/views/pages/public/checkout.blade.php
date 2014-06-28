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
        <h4 class="text-center">Checkout</h4>
        <span class="border"></span>
    </div>
    <div class="row space-top-2">
        <div class="col-sm-4">
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
        <div class="col-sm-4">
            <div class="widget">
                <div class="bg-color default">
                    <h4 class="widget-title"><strong>1</strong> Billing Info</h4>
                </div>
                <div class="bg-color white box-padding">
                    <form method="POST" action="http://leaguetogether.dev/checkout/store" accept-charset="UTF-8" id="pay">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" placeholder="John" value="{{$user->firstname}}" />
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" placeholder="Doe" value="{{$user->lastname}}" />
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" class="form-control" placeholder="name@domain.com" value="{{$user->email}}" />
                        </div>
                        <div class="form-group">
                            <label>Contact Phone Number</label>
                            <input id="mobile" class="form-control input-sm" placeholder="eg. 555-555-5555" value="{{$user->mobile}}" tabindex="5" name="mobile" type="text" maxlength="14" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Street Address</label>
                            <input type="text" class="form-control" placeholder="eg. 80 Dolphin St" />
                        </div>
                        <div class="form-group">
                            <label>Apartment, Suite, Unit, Building, etc.</label>
                            <input type="text" class="form-control" placeholder="eg. 379" />
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" placeholder="eg. New York" />
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <br />
                            <div class="select">
                                <select data-label="State" data-type="text" name="state">
                                    <option></option>
                                    <option value="AL">Alabama</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Billing Zip</label>
                            <div class="input-group">
                                {{Form::text('zip', '', array('id'=>'zip','class'=>'form-control','placeholder'=>'eg. 83401','tabindex'=>'5', 'required', 'autofocus')) }}
                                <span class="input-group-addon"><span class="retinaicon-essentials-019"></span></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="widget">
                <div class="bg-color default">
                    <h4 class="widget-title"><strong>2</strong> Payment</h4>
                </div>
                <div class="bg-color white box-padding">
                    {{ Form::open(array('action' => 'PaymentController@store','id'=>'pay','method' => 'post')) }}
                    @if($vault)
                    <div class="card-details">
                        Card: {{$vault->customer_vault->customer->cc_number}}<br>
                        Exp: {{substr_replace($vault->customer_vault->customer->cc_exp, '/', -2, 0)}}<br>
                        Zip: {{$vault->customer_vault->customer->postal_code}}4<br>
                        {{Form::hidden('vault', $vault->customer_vault->customer->customer_vault_id) }}
                    </div>
                    @else
                    <div class="form-group">
                        <label>CARD NUMBER</label>
                        <div class="input-group">
                            {{Form::text('card', '', array('id'=>'card','class'=>'form-control','placeholder'=>'Valid Card Number','tabindex'=>'1', 'required', 'autofocus')) }}
                            <span class="input-group-addon"><span class="retinaicon-finance-016"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-md-4">
                            <div class="form-group">
                                <label for="expityMonth">MONTH</label>
                                {{Form::text('month', '', array('id'=>'month','class'=>'form-control','placeholder'=>'MM','tabindex'=>'2', 'required')) }}
                            </div>
                        </div>
                        <div class="col-xs-4 col-md-4">
                            <div class="form-group">
                                <label for="cvCode">YEAR</label>
                                {{Form::text('year', '', array('id'=>'year','class'=>'form-control','placeholder'=>'YY','tabindex'=>'3', 'required')) }}
                            </div>
                        </div>
                        <div class="col-xs-4 col-md-4">
                            <div class="form-group">
                                <label for="cvCode">CV CODE</label>
                                {{Form::text('cvc', '', array('id'=>'cvc','class'=>'form-control','placeholder'=>'CV','tabindex'=>'4', 'required')) }}
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($vault)
                    <button class="btn btn-primary btn-sm btn-block" type="submit">Make Payment</button>
                    @else
                    <button class="btn btn-primary btn-sm btn-block vault space-top-1">Verify Payment</button>
                    @endif
                    {{ Form::close() }}
                </div>
            </div>
            <div class="widget box-padding space-top-1">
                <div class="form-group">
                    <label>Have a discount code?</label>
                    <div class="input-group">
                        {{Form::text('zip', '', array('id'=>'zip','class'=>'form-control','placeholder'=>'Discount code','tabindex'=>'5', 'required', 'autofocus')) }}
                        <span class="input-group-addon"><span class="retinaicon-finance-034"></span></span>
                    </div>
                </div>
                <button class="btn btn-info btn-sm btn-block vault space-top-1">Apply</button>
            </div>
            <div class="ajax-error">
            </div>
            @if(Session::has('error'))
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="alert alert-warning alert-dismissable">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            {{ Session::get('error') }}
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <br/>
        </div>
        <div class="col-sm-4">
            <div class="widget">
                <div class="bg-color default">
                    <h4 class="widget-title"><strong>3</strong> Order Summary</h4>
                </div>
                <div class="bg-color white box-padding">
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
                                <td>{{money_format("%.2n",$service_fee)}}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right">Total</td>
                                <td>{{money_format('%.2n',$cart_total)  }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-primary btn-lg btn-block vault space-top-1">Place Order</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop