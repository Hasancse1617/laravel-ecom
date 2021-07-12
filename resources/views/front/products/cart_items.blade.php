<!-- PreLoader Ajax -->
<div id="preloader_back"></div>
<div id="cart-preloader">
  <div class="loader clear-loader">
    <img class="img-fluid" src="{{ asset('images/front_images/loader.gif') }}" alt="">
  </div>
</div>
<!-- End Preloader Ajax -->

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
         @if(Session::has('error_message'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('error_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

        @if(count($userCartItems) > 0)
        <div class="table-responsive" id="appendCartItems">
          <table class="cart-table table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Size</th>
                <th scope="col">Price</th>
                <th scope="col">Discount</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              <?php $total_price = 0; ?>
             @foreach($userCartItems as $item)
             <?php $attrPrice = App\Product::getDiscountAttrprice($item['product_id'],$item['size']) ?>       
              <tr>
                <td>
                  <div class="cart-thumb media align-items-center">
                    <a href="{{ url('/product/'.$item['product']['id']) }}">
                      <img class="img-fluid" src="{{ url('images/product_images/small/'.$item['product']['main_image']) }}" alt="">
                    </a>
                    <div class="media-body ml-3">
                      <div class="product-title mb-2"><a class="link-title" href="{{ url('/product/'.$item['product']['id']) }}">{{ $item['product']['product_name'] }}</a>
                      </div>
                    </div>
                  </div>
                </td>
                <td> <span class="product-price text-muted">{{ $item['size'] }}</span>
                </td>
                <td> 
                  <span class="product-price text-muted">${{ $attrPrice['product_price']*$item['quantity'] }}</span>
                </td>
                <td> 
                  <span class="product-price text-muted">${{ $attrPrice['discount']*$item['quantity'] }}</span>
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <button class="btn-product btn-product-up btnItemUpdate qtyMinus" data-cartid="{{ $item['id'] }}"> <i class="las la-minus"></i>
                    </button>
                    <input class="form-product" type="number" name="form-product" value="{{ $item['quantity'] }}">
                    <button class="btn-product btn-product-down btnItemUpdate qtyPlus" data-cartid="{{ $item['id'] }}"> <i class="las la-plus"></i>
                    </button>
                  </div>
                </td>
                <td> <span class="product-price text-dark font-w-6">${{ $attrPrice['final_price'] * $item['quantity'] }} </span>
                  <a href="" class="close-link btnItemDelete" data-cartid="{{ $item['id'] }}">&nbsp;<i class="las la-times"></i></a>
                </td>
              </tr>
              <?php $total_price = $total_price + ($attrPrice['final_price'] * $item['quantity']) ?>
              @endforeach
            </tbody>
          </table>
        </div>
        @else
          <div class="justify-content-center d-flex">
            <h1>Your Cart Is Empty</h1>
          </div> 
        @endif
        
      </div>
      <div class="col-lg-4 pl-lg-5 mt-8 mt-lg-0">
        <div class="border rounded p-5 bg-light-4">
          <h4 class="text-black text-left mb-2 font-w-6">Cart Totals</h4>
          <div class="d-flex justify-content-between align-items-center border-bottom py-3"> <span class="text-muted">Subtotal</span>  <span class="text-dark">${{ (@$total_price)? $total_price : 0 }}</span> 
          </div>
          <div class="d-flex justify-content-between align-items-center border-bottom py-3"> <span class="text-muted">Coupon Discount</span>  <span class="text-dark couponAmount">@if(Session::has('couponAmount')) ${{ Session::get('couponAmount') }} @else $0.00 @endif</span> 
          </div>
          <div class="d-flex justify-content-between align-items-center pt-3 mb-5"> <span class="text-dark h5">Total</span>  <span class="text-dark font-w-6 h5 grandTotal">${{ @$total_price - Session::get('couponAmount') }}</span> 
          </div> 
          <a class="btn btn-primary btn-animated btn-block" href="{{ url('checkout') }}">Proceed To Checkout</a>
          <a class="btn btn-dark btn-animated mt-3 btn-block" href="{{ url('/') }}">Continue Shopping</a>
        </div>
      </div>
    </div>
    <div class="d-md-flex align-items-end justify-content-between py-5 px-5 mt-5 bg-light-4">
          <div>
            <label class="text-black h4" for="coupon">Coupon</label>
            <p>Enter your coupon code if you have one.</p>
            <form action="javascript:" method="post" id="ApplyCoupon" @if(Auth::check()) user="1" @endif>
              @csrf
              <div class="row form-row">
                <div class="col">
                  <input class="form-control" id="coupon" name="coupon" placeholder="Coupon Code" type="text" required="">
                </div>
                <div class="col col-auto">
                  <button type="submit" class="btn btn-dark btn-animated">Apply Coupon</button>
                </div>
              </div>
            </form>
          </div>
          <button class="btn btn-primary btn-animated mt-3 mt-md-0">Update Cart</button>
        </div>
  </div>
</section>