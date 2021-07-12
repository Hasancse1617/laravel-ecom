<?php $userCartItems = App\Cart::userCartItems(); ?>

<ul class="cart_list">
  <?php $total_price = 0; ?>
  @foreach($userCartItems as $item)
  <?php $attrPrice = App\Product::getDiscountAttrprice($item['product_id'],$item['size']) ?>
	<li> 
	  <a href="#" class="item_remove">
	    <i class="ion-ios-close-empty"></i>
	  </a> 
	  <a href="{{ url('/product/'.$item['product']['id']) }}"><img src="{{ url('images/product_images/small/'.$item['product']['main_image']) }}" alt="cart_thumb1">{{ $item['product']['product_name'] }}</a> 
	  <span class="cart_quantity"> {{ $item['quantity'] }} x <span class="cart_amount"> <span class="price_symbole">$</span></span>{{ $attrPrice['final_price'] }}</span> 
	</li>
  <?php $total_price = $total_price + ($attrPrice['final_price'] * $item['quantity']) ?>
  @endforeach
 </ul>
 <div class="cart_footer">
    <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">$</span></span>{{ $total_price }}</p>
    <p class="cart_buttons"><a href="{{ url('/cart') }}" class="btn btn-secondary view-cart ml-2 mr-2">View Cart</a><a href="#" class="btn btn-primary ml-2 mr-2 checkout">Checkout</a></p>
</div>