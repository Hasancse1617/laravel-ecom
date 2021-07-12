@extends('layouts.front_layout.front_layout')
@section('content')

<section class="bg-light py-6">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="h2 mb-0">Product Checkout</h1>
      </div>
      <div class="col-md-6 mt-3 mt-md-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-md-end bg-transparent p-0 m-0">
            <li class="breadcrumb-item"><a class="link-title" href="#">Home</a> </li>
            <li class="breadcrumb-item"><a class="link-title" href="#">Shop</a></li>
            <li class="breadcrumb-item active text-primary" aria-current="page">Product Checkout</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- / .row -->
  </div>
  <!-- / .container -->
</section>

<!--hero section end--> 


<!--body content start-->
<form action="javascript:" method="post" id="ApplyCoupon"  @if(Auth::check()) user="1" @endif>
  @csrf
</form>
<div class="page-content">

<section class="checkout-page">
  <div class="container">
    <form id="checkoutForm" name="checkoutForm" action="{{ url('/checkout') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-lg-7 col-md-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="checkout-form box-shadow white-bg">
          <h4 class="mb-4 font-w-6">Billing Details</h4>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" id="fname" name="fname" class="form-control" placeholder="Your firstname" value="{{ @$userDetails->fname }}" readonly="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" id="lname" name="lname" class="form-control" placeholder="Your lastname" value="{{ @$userDetails->lname }}" readonly="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>E-mail Address</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ @$userDetails->email }}" readonly="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Phone Number</label>
                <input type="text" id="mobile" name="mobile" class="form-control" placeholder="" value="{{ @$userDetails->mobile }}" readonly="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Address</label>
                <input type="text" id="address" name="address" class="form-control" placeholder="Address" value="{{ @$userDetails->address }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="country">Select Country</label>
                <select name="country" id="country" class="form-control select2" style="width: 100%;">
                    <option>Select country</option>
                    @foreach($countries as $country)
                      <option value="{{ $country->country_name }}" @if($country->country_name == $userDetails->country) selected="" @endif>{{ $country->country_name }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Town/City</label>
                <input type="text" id="city" name="city" class="form-control" placeholder="Town or City" value="{{ $userDetails->city }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-md-0">
                <label>State/Province</label>
                <input type="text" id="district" name="district" class="form-control" placeholder="State Province" value="{{ $userDetails->district }}" >
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-md-0">
                <label>Zip/Postal Code</label>
                <input type="text" id="zipcode" name="zipcode" class="form-control" placeholder="Zip / Postal" value="{{ $userDetails->pincode }}">
              </div>
            </div>
          </div>
        </div>

        <div class="form-group mb-md-0">
          <input type="checkbox" name="ship_address" class="checkout-toggle" style="margin: 40px 0;">
          <label>Ship to a different address?</label>
        </div>

        <div class="checkout-form different-address box-shadow white-bg" style="display:none;">
          <h4 class="mb-4 font-w-6">You Can Edit Shipping Address</h4>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" id="shipping_fname" name="shipping_fname" value="{{ @$delivery['shipping_fname'] }}" class="form-control" placeholder="Your firstname">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" id="shipping_lname" name="shipping_lname" value="{{ @$delivery['shipping_lname'] }}" class="form-control" placeholder="Your lastname">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Address</label>
                <input type="text" id="shipping_address" name="shipping_address" value="{{ @$delivery['shipping_address'] }}" class="form-control" placeholder="Address">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="dcountry">Select Country</label>
                <select name="shipping_country" id="shipping_country"  class="form-control select2" style="width: 100%;">
                    <option value="#">Select country</option>
                    @foreach($countries as $country)
                      <option value="{{ $country->country_name }}" @if($country->country_name == @$delivery['shipping_country']) selected="" @endif>{{ $country->country_name }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Mobile</label>
                <input type="text" id="shipping_mobile" name="shipping_mobile" value="{{ @$delivery['shipping_mobile'] }}" class="form-control" placeholder="Mobile">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Town/City</label>
                <input type="text" id="shipping_city" name="shipping_city" value="{{ @$delivery['shipping_city'] }}" class="form-control" placeholder="Town or City">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-md-0">
                <label>State/Province</label>
                <input type="text" id="shipping_district" name="shipping_district" value="{{ @$delivery['shipping_district'] }}" class="form-control" placeholder="State Province">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-md-0">
                <label>Zip/Postal Code</label>
                <input type="text" id="shipping_zipcode" name="shipping_zipcode" value="{{ @$delivery['shipping_zipcode'] }}" class="form-control" placeholder="Zip / Postal">
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="col-lg-5 col-md-12 mt-5 mt-lg-0">
        <div class="border bg-light-4 p-3 p-lg-5">
        <span id="checkout_items">
          @include('front.products.checkout_items')
        </span>
        <div class="cart-detail my-5">
          <h6 class="mb-3 font-w-6">Payment Method</h6>
          <div class="form-group">
            <div class="custom-control custom-radio">
              <input type="radio" id="customRadio1" name="payment_gateway" class="custom-control-input">
              <label class="custom-control-label" for="customRadio1">Direct Bank Tranfer</label>
            </div>
          </div>
          <div class="form-group">
            <div class="custom-control custom-radio">
              <input type="radio" id="customRadio2" name="payment_gateway" class="custom-control-input">
              <label class="custom-control-label" for="customRadio2">Check Payment</label>
            </div>
          </div>
          <div class="form-group">
            <div class="custom-control custom-radio">
              <input type="radio" id="cod" name="payment_gateway" value="COD" class="custom-control-input">
              <label class="custom-control-label" for="cod">Cash on Delivery</label>
            </div>
          </div>
          <div class="form-group">
            <div class="custom-control custom-radio">
              <input type="radio" id="customRadio3" name="payment_gateway" class="custom-control-input">
              <label class="custom-control-label" for="customRadio3">Paypal Account</label>
            </div>
          </div>
          <div class="form-group mb-0">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="customCheck1" name="terms">
              <label class="custom-control-label" for="customCheck1">I have read and accept the terms and conditions</label>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-animated btn-block">Proceed to Payment</button>
        </div>
      </div>
    </div>
    </form>
  </div>
</section>

</div>

 @include('layouts.front_layout.subscribe')  
<script type="text/javascript">
  $(document).ready(function () {
    
    $('#checkoutForm').validate({
      rules: {
        fname: {
          required: true,
        },
        lname: {
          required: true,
        },
        mobile: {
          required: true,
          minlength: 11,
          maxlength:11,
          digits: true
        },
        address:{
          required:true
        },
        country:{
          required:true
        },
        city:{
          required:true
        },
        district:{
          required:true
        },
        zipcode:{
          required:true
        },
        payment_gateway:{
          required:true
        },
        terms:{
          required:true
        }
        
        
      },
      messages: {
        
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>
@endsection

