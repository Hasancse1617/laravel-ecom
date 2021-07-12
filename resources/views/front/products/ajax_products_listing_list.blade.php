@foreach($categoryProducts as $product)
<?php $image = App\ProductsImage::hoverImage($product['id']); ?>
<?php $discounted_price = App\Product::getDiscountedPrice($product['id']); ?>
<div class="card product-list mb-5">
  <div class="row align-items-center">
    <div class="col-lg-4 col-md-5">
      @if($discounted_price['discount'] > 0)<div class="sale-label">-{{ $discounted_price['discount'] }}%</div>@endif
      <a class="card-img-hover d-block" href="{{ url('product/'.$product['id']) }}">
        <?php $image_path = "images/product_images/small/".$product['main_image']; ?>
         @if(!empty($product['main_image']) && file_exists($image_path))
         <img class="card-img-top card-img-back" src="{{ asset('images/product_images/small/'.$product['main_image']) }}" alt="..."> 
         @else
         <img class="card-img-top card-img-back" src="{{ asset('images/product_images/small/no-image.jpg') }}" alt="..."> 
         @endif
        <!-- Hover Image -->
         @if(!empty($image->image))
         <img class="card-img-front" src="{{ asset('images/product_images/small/'.$image->image) }}" alt="...">
         @endif
      </a>
    </div>
    <div class="col-lg-8 col-md-7">
      <div class="card-info">
        <div class="card-body">
          <div class="product-title"><a class="link-title" href="{{ url('product/'.$product['id']) }}">{{ $product['product_name'] }}</a>
          </div>
          <div class="mt-1"> 
            @if($discounted_price['discounted_price'] > 0)
            <span class="product-price text-pink"><del class="text-muted">${{ $product['product_price'] }}</del> ${{ $discounted_price['discounted_price'] }}</span>
            @else
            <span class="product-price text-pink"> ${{ $product['product_price'] }}</span>
            @endif
            <?php 
               $reviews = App\Review::reviews($product['id']);
               $totalReview = App\Review::where('status',1)->where('product_id',$product['id'])->sum('rating');
             ?>
            <div class="star-rating">
              <img class="one" src="{{ url('images/product_images/small/rating.png') }}" alt="" style="clip: rect(0px,@if(count($reviews)>0){{($totalReview/count($reviews))*20}}px @else 0px @endif,50px,0px);">
              <img src="{{ url('images/product_images/small/rating_black.png') }}" alt="">
            </div>
          </div>
          <p class="mb-3 mt-2">{{ substr($product['description'],0,200) }}</p>
        </div>
        <div class="card-footer bg-transparent border-0">
          <div class="product-link d-flex align-items-center">
            <button class="btn btn-compare mr-2" data-toggle="tooltip" data-placement="top" title="" type="button" data-original-title="Compare"><i class="las la-random"></i> 
            </button>
            <button product-id="{{ $product['id'] }}" user-id="@if(Auth::check()){{Auth::user()->id}}@endif" class="btn btn-compare mr-2 add_to_wishlist" data-toggle="tooltip" data-placement="top" title="" type="button" data-original-title="Compare"><i class="lar la-heart"></i>
            </button>
            <a href="{{ url('product/'.$product['id']) }}"><button class="btn-cart btn btn-pink mr-2" type="button"><i class="las la-shopping-cart mr-1"></i> Add to cart </button></a>
            <button class="btn btn-view" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"><i class="ion-ios-search-strong"></i></span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
<nav aria-label="Page navigation" class="mt-5 listing_pagi">
    {!! $categoryProducts->links() !!}      
</nav>

<div style="display: none;" class="show_of_show">
   @if(!$categoryProducts->total() == 0)
     Showing {{($categoryProducts->currentpage()-1)*$categoryProducts->perpage()+1}} to {{($categoryProducts->currentpage()*$categoryProducts->perpage() > $categoryProducts->total())? $categoryProducts->total() : $categoryProducts->currentpage()*$categoryProducts->perpage()}}
    of  {{$categoryProducts->total()}} total
    @endif
</div>
