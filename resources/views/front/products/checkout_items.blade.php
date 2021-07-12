<div class="mb-7">
          
    <label class="text-black mb-3">Enter your coupon code if you have one</label>
    <div class="input-group">
      <input class="form-control" id="coupon" name="coupon" placeholder="Coupon Code" aria-label="Coupon Code" aria-describedby="button-addon2" type="text"  required="" form="ApplyCoupon">
      <div class="input-group-append">
        <input class="btn btn-primary btn-sm px-4" type="submit" name="submit"  id="button-addon2" form="ApplyCoupon" value="Apply">
      </div>
    </div>
   
  </div>
  
<div class="mb-7">
  <h6 class="mb-3 font-w-6">Your Order</h6>
  <ul class="list-unstyled">
    <?php $total_price = 0; ?>
    @foreach($userCartItems as $item)
     <?php $attrPrice = App\Product::getDiscountAttrprice($item['product_id'],$item['size']) ?>
    
    <li class="mb-3 border-bottom pb-3 d-flex"><span class="mr-auto"> {{ $item['quantity'] }} x {{ $attrPrice['product_price'] }} &nbsp;-- &nbsp;{{ $item['product']['product_name'] }} </span> <span>${{ $item['quantity']*$attrPrice['product_price'] }}</span></li>

    <?php $total_price = $total_price + ($attrPrice['final_price'] * $item['quantity']) ?>
    @endforeach
    <li class="mb-3 border-bottom pb-3 d-flex"><span class="mr-auto"> Discount </span> <span>${{ $attrPrice['discount']*$item['quantity'] }}</span></li>
    <li class="mb-3 border-bottom pb-3 d-flex"><span class="mr-auto"> Subtotal </span> <span>${{ $total_price }}</span></li>
    <li class="mb-3 border-bottom pb-3 d-flex"><span class="mr-auto"> Coupon Discount </span> <span>@if(Session::has('couponAmount')) ${{ Session::get('couponAmount') }} @else $0.00 @endif</span></li>
    <li class="mb-3 border-bottom pb-3 d-flex"><span class="mr-auto"> Shipping </span> <span>$99.00</span></li>
    <li class="d-flex"><span class="mr-auto"><strong class="cart-total"> Total :</strong></span>  <strong class="cart-total">${{ $grand_total = $total_price - Session::get('couponAmount') }} <?php Session::put('grand_total',$grand_total); ?></strong>
    </li>
  </ul>
</div>