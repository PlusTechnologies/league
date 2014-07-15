@extends('layouts.public.default')
@section('content')
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
          <h4 class="widget-title"><strong>1</strong> Billing Information</h4>
        </div>

        <div class="bg-color white box-padding">
          @if($vault)
          <h4><span class="retinaicon-essentials-053"></span></h4>
          <label>Invoice to:</label>
          <p>{{$user->firstname}} {{$user->lastname}} <br>
            {{$user->email}}<br>
            {{$user->mobile}}
          </p>
          <h4><span class="retinaicon-essentials-042"></span></h4>
          <label>Billing Address:</label>
          <p>
            {{$vault->customer_vault->customer->address_1}}<br>
            {{$vault->customer_vault->customer->city}}, 
            {{$vault->customer_vault->customer->state}}
            {{$vault->customer_vault->customer->postal_code}}<br>
          </p>
          @else
          <div class="form-group">
            <label>Street Address</label>
            {{Form::text('address', '', array('id'=>'address','class'=>'form-control','placeholder'=>'eg. 80 Dolphin St','tabindex'=>'2', 'required')) }}
          </div>
          <div class="form-group">
            <label>City</label>
            {{Form::text('city','',array('id'=>'city','class'=>'form-control','placeholder'=>'eg. New York','tabindex'=>'2', 'required')) }}
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
              {{Form::text('zip', '', array('id'=>'zip','class'=>'form-control','placeholder'=>'eg. 83401','tabindex'=>'5', 'required')) }}
              <span class="input-group-addon"><span class="retinaicon-essentials-019"></span></span>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="widget">
        <div class="bg-color default">
          <h4 class="widget-title"><strong>2</strong> Payment Method</h4>
        </div>
        <div class="bg-color white box-padding">
          @if($vault)
          <div class="card-details">
            <h4><span class="retinaicon-finance-016"></span></h4>
            <label>Credit Card:</label>
            <p>
              Card: {{$vault->customer_vault->customer->cc_number}}<br>
              Exp: {{substr_replace($vault->customer_vault->customer->cc_exp, '/', -2, 0)}}<br>
            </p>
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
        </div>
      </div>
      {{ Form::open(array('action' => 'PaymentController@store','id'=>'pay','method' => 'post')) }}
      <div class="widget box-padding space-top-1">
        <div class="form-group">
          <label>Have a promo code?</label>
          <div class="input-group">
            {{Form::text('code', '', array('id'=>'code','class'=>'form-control','placeholder'=>'Discount code','tabindex'=>'5', 'autofocus')) }}
             @if($vault)
            {{Form::hidden('vault', $vault->customer_vault->customer->customer_vault_id) }}
            @endif
            <span class="input-group-addon"><span class="retinaicon-finance-034"></span></span>
          </div>
          <button class="btn btn-info btn-sm btn-block space-top-1 code">Apply</button>
        </div>

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
          <table class="table">
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
                <td class="text-right" >{{money_format('%.2n',$item->price)  }}</td>
              </tr>
              @endforeach
              @if(Session::has('discount'))
              <tr class="text-right">
                <td colspan="2" class="text-right">Discount</td>
                <td>{{money_format("%.2n", - $discount )  }}</td>
                {{Form::hidden('discount', Session::get('discount')['id'] ) }}
              </tr>
              @endif

              <tr class="text-right">
                <td colspan="2" class="text-right">Subtotal</td>
                <td>{{money_format("%.2n",$subtotal)  }}</td>
              </tr>
              <tr class="text-right">
                <td colspan="2" >Taxes and fees</td>
                <td>{{money_format("%.2n",$tax + $service_fee)}}</td>
              </tr>
              <tr class="sum-total text-right">
                <td colspan="2" >Total</td>
                <td>{{money_format('%.2n',$cart_total)  }}</td>
              </tr>
            </tbody>
          </table>
          @if($vault)
          <button class="btn btn-primary btn-block space-top-1 btn-sm process" type="submit">Place Order</button>
          @else
          <button class="btn btn-primary btn-block vault space-top-1 btn-sm">Verify Payment</button>
          @endif
        </div>
      </div>
    </div>
    {{ Form::close() }}
  </div>
  <div class="row space-top-2"></div>
</div>
@stop