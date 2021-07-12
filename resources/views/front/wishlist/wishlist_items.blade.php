<?php $countWIshlist = count($wishlists); ?>
@if($countWIshlist > 0)
<table class="cart-table table">
    <thead>
      <tr>
        <th scope="col">Product</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">&nbsp;</th>
      </tr>
    </thead>
    <tbody>

      @foreach($wishlists as $list)
      <tr>
        <td>
          <div class="cart-thumb media align-items-center">
            <a href="{{ url('product/'.$list['product']['id']) }}">
               <?php $image_path = "images/product_images/small/".$list['product']['main_image']; ?>
               @if(!empty($list['product']['main_image']) && file_exists($image_path))
               <img class="img-fluid" src="{{ asset('images/product_images/small/'.$list['product']['main_image']) }}" alt="..."> 
               @else
               <img class="img-fluid" src="{{ asset('images/product_images/small/no-image.jpg') }}" alt="..."> 
               @endif

            </a>
            <div class="media-body ml-3">
              <div class="product-title mb-2"><a class="link-title" href="{{ url('product/'.$list['product']['id']) }}">{{ $list['product']['product_name'] }}</a>
              </div>
            </div>
          </div>
        </td>
        <td> <span class="product-price text-muted">${{ $list['product']['product_price'] }}</span>
        </td>
        <td>
          <div class="d-flex align-items-center">
            <button class="btn-product btn-product-up"> <i class="las la-minus"></i>
            </button>
            <input class="form-product" type="number" name="form-product" value="1">
            <button class="btn-product btn-product-down"> <i class="las la-plus"></i>
            </button>
          </div>
        </td>
        <td> 
          <a href="{{ url('product/'.$list['product']['id']) }}"><button class="btn-cart btn btn-pink mx-3" type="button"><i class="las la-shopping-cart mr-1"></i> Add to cart </button></a>
          <button style="border: none;" product-id="{{$list['product']['id']}}" class="close-link close-wishlist"><i class="las la-times"></i></button>
        </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
  @else
   <h2>Your Wishlist Product is Empty...</h2>
  @endif