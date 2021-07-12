
@extends('layouts.front_layout.front_layout')
@section('content')
<?php 
    $reviews = App\Review::reviews($productDetails['id']);
    $totalReview = App\Review::where('status',1)->where('product_id',$productDetails['id'])->sum('rating');
    $fiveReview = App\Review::where('status',1)->where('product_id',$productDetails['id'])->where('rating',5)->count('rating');
    $fourReview = App\Review::where('status',1)->where('product_id',$productDetails['id'])->where('rating',4)->count('rating');
    $threeReview = App\Review::where('status',1)->where('product_id',$productDetails['id'])->where('rating',3)->count('rating');
    $twoReview = App\Review::where('status',1)->where('product_id',$productDetails['id'])->where('rating',2)->count('rating');
    $oneReview = App\Review::where('status',1)->where('product_id',$productDetails['id'])->where('rating',1)->count('rating');
   
?>
<section class="bg-light py-6">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-md-6">
            <h1 class="h2 mb-0">Product Page</h1>
         </div>
         <div class="col-md-6 mt-3 mt-md-0">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb justify-content-md-end bg-transparent p-0 m-0">
                  <li class="breadcrumb-item"><a class="link-title" href="{{ url('/') }}">Home</a> </li>
                  <li class="breadcrumb-item"><a class="link-title" href="{{ url('/'.$productDetails['category']['url']) }}">{{ $productDetails['category']['category_name'] }}</a></li>
                  <li class="breadcrumb-item active text-primary" aria-current="page">{{ $productDetails['product_name'] }}</li>
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
<div class="page-content">
   <!--product details start-->
   <section>
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-12">
               <div class="product-image">
                  <div class="product_img_box">
                     <img id="product_img" src="{{ url('images/product_images/small/'.$productDetails['main_image']) }}" data-zoom-image="{{ url('images/product_images/large/'.$productDetails['main_image']) }}" alt="product_img1" />
                     <a href="#" class="product_img_zoom" title="Zoom">
                     <span class="linearicons-zoom-in"></span>
                     </a>
                  </div>
                  <div id="pr_item_gallery" class="product_gallery_item slick_slider no-pb owl-carousel owl-2" data-dots="false" data-nav="false" data-items="5" data-md-items="2" data-sm-items="1">
                     
                     @foreach($productDetails['images'] as $image)
                     <div class="item">
                        <a href="#" class="product_gallery_item active" data-image="{{ url('images/product_images/small/'.$image['image']) }}" data-zoom-image="{{ url('images/product_images/large/'.$image['image']) }}">
                        <img src="{{ url('images/product_images/small/'.$image['image']) }}" alt="product_small_img1" />
                        </a>
                     </div>
                     @endforeach
                    
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-12 mt-5 mt-lg-0">
               <div class="product-details">

                  @if(Session::has('success_message'))
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                     {{ Session::get('success_message') }}
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   @endif

                  @if(Session::has('error_message'))
                   <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     {{ Session::get('error_message') }}
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   @endif
                  <?php $discounted_price = App\Product::getDiscountedPrice($productDetails['id']); ?>
                  <h1 class="h4 mb-0 font-w-6">{{ $productDetails['product_name'] }}</h1>
                  <div class="star-rating mb-5">
                     <img class="one" src="{{ url('images/product_images/small/rating.png') }}" alt="" style="clip: rect(0px,@if(count($reviews)>0){{($totalReview/count($reviews))*20}}px @else 0px @endif,50px,0px);">
                     <img src="{{ url('images/product_images/small/rating_black.png') }}" alt="">
                     ({{count($reviews)}})
                  </div>
                  @if($discounted_price['discounted_price'] > 0)
                  <span class="product-price h5 text-pink getAttrPrice">${{ $discounted_price['discounted_price'] }} <del class="text-muted h6">${{ $productDetails['product_price'] }}</del></span>
                  @else
                  <span class="product-price h5 text-pink getAttrPrice">${{ $productDetails['product_price'] }}</span>
                  @endif
                  <ul class="list-unstyled my-5">
                     <li><small>Availibility: <span class="text-green">@if($totalstock > 0) In Stock @else Out of Stock @endif</span> </small>
                     </li>
                     <li class="font-w-4"><small>Categories :<span class="text-muted"> {{ $productDetails['category']['category_name'] }}</span></small>
                     </li>
                  </ul>
                  <p class="mb-5 border-top border-bottom pb-5 pt-5 desc">{{ substr($productDetails['description'],0,200) }}</p>
                  <form action="{{ url('add-to-cart') }}" method="post">
                     @csrf
                     <input type="hidden" name="product_id" value="{{ $productDetails['id'] }}">
                     <div class="d-sm-flex align-items-center mb-5">
                        <div class="d-flex align-items-center mr-sm-4">
                           <button class="btn-product btn-product-up btn-product-up-detail"> <i class="las la-minus"></i>
                           </button>
                           <input class="form-product" type="number" name="quantity" value="1" required="">
                           <button class="btn-product btn-product-down btn-product-down-detail"> <i class="las la-plus"></i>
                           </button>
                        </div>
                        <select name="size" product-id="{{ $productDetails['id'] }}" class="custom-select mt-3 mt-sm-0" id="getPrice" required="">
                           <option value="" selected>Select Size</option>
                           @foreach($productDetails['attributes'] as $attribute)
                           <option value="{{ $attribute['size'] }}">{{ $attribute['size'] }}</option>
                           @endforeach
                        </select>
                        <div class="d-flex text-center ml-sm-4 mt-3 mt-sm-0">
                           <div class="form-check pl-0 mr-2">
                              <input type="radio" class="form-check-input" id="color-filter1" name="Radios">
                              <label class="form-check-label" for="color-filter1" data-bg-color="#ffc107"></label>
                           </div>
                           <div class="form-check pl-0 mr-2">
                              <input type="radio" class="form-check-input" id="color-filter2" name="Radios" checked>
                              <label class="form-check-label" for="color-filter2" data-bg-color="#6d5b97"></label>
                           </div>
                           <div class="form-check pl-0 mr-2">
                              <input type="radio" class="form-check-input" id="color-filter3" name="Radios">
                              <label class="form-check-label" for="color-filter3" data-bg-color="#88b04b"></label>
                           </div>
                           <div class="form-check pl-0">
                              <input type="radio" class="form-check-input" id="color-filter4" name="Radios">
                              <label class="form-check-label" for="color-filter4" data-bg-color="#23a5a8"></label>
                           </div>
                        </div>
                     </div>
                     <div class="d-sm-flex align-items-center mt-5">
                        <button type="submit" class="btn btn-primary btn-animated mr-sm-3 mb-3 mb-sm-0"><i class="las la-shopping-cart mr-2"></i>Add To Cart</button>
                        
                        <a class="btn btn-animated btn-dark add_to_wishlist" product-id="{{ $productDetails['id'] }}" user-id="@if(Auth::check()){{Auth::user()->id}}@endif" > <i class="lar la-heart mr-2 ic-1-2x"></i>Add To Wishlist
                        </a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--product details end-->
   <!--tab start-->
   <section class="pt-0 pb-8">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="tab product-tab">
                  <!-- Nav tabs -->
                  <nav>
                     <div class="nav nav-tabs" id="nav-tab" role="tablist"> <a class="nav-item nav-link active ml-0" id="nav-tab1" data-toggle="tab" href="#tab3-1" role="tab" aria-selected="true">Description</a>
                        <a class="nav-item nav-link" id="nav-tab2" data-toggle="tab" href="#tab3-2" role="tab" aria-selected="false">Specification</a>
                        <a class="nav-item nav-link" id="nav-tab3" data-toggle="tab" href="#tab3-3" role="tab" aria-selected="false">Ratings and Reviews</a>
                     </div>
                  </nav>
                  <!-- Tab panes -->
                  <div class="tab-content pt-5 p-0">
                     <div role="tabpanel" class="tab-pane fade show active" id="tab3-1">
                        <div class="row align-items-center">
                           <div class="col-md-12">
                              <p>{{ $productDetails['description'] }}</p>
                           </div>
                        </div>
                     </div>
                     <div role="tabpanel" class="tab-pane fade" id="tab3-2">
                        <table class="table table-bordered mb-0">
                           <tbody>
                              <tr>
                                 <td>Brand</td>
                                 <td>{{ $productDetails['brand']['name'] }}</td>
                              </tr>
                              <tr>
                                 <td>Code</td>
                                 <td>{{ $productDetails['product_code'] }}</td>
                              </tr>
                              <tr>
                                 <td>Size</td>
                                 <td>
                                  @foreach($productDetails['attributes'] as $attribute)
                                  {{ $attribute['size']}},
                                  @endforeach
                                </td>
                              </tr>
                              <tr>
                                 <td>Color</td>
                                 <td>{{ $productDetails['product_color'] }}</td>
                              </tr>
                              <tr>
                                 <td>Chest</td>
                                 <td>38 inches</td>
                              </tr>
                              <tr>
                                 <td>Waist</td>
                                 <td>20 cm</td>
                              </tr>
                              <tr>
                                 <td>Length</td>
                                 <td>35 cm</td>
                              </tr>
                              @if(!empty($productDetails['fabric']))
                              <tr>
                                 <td>Fabric</td>
                                 <td>{{ $productDetails['fabric'] }}</td>
                              </tr>
                              @endif
                              @if(!empty($productDetails['pattern']))
                              <tr>
                                 <td>Pattern</td>
                                 <td>{{ $productDetails['pattern'] }}</td>
                              </tr>
                              @endif
                              @if(!empty($productDetails['sleeve']))
                              <tr>
                                 <td>Sleeve</td>
                                 <td>{{ $productDetails['sleeve'] }}</td>
                              </tr>
                              @endif
                              @if(!empty($productDetails['fit']))
                              <tr>
                                 <td>Fit</td>
                                 <td>{{ $productDetails['fit'] }}</td>
                              </tr>
                              @endif
                              @if(!empty($productDetails['occasion']))
                              <tr>
                                 <td>Occasion</td>
                                 <td>{{ $productDetails['occasion'] }}</td>
                              </tr>
                              @endif
                              <tr>
                                 <td>Warranty</td>
                                 <td>6 Months</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     
                     <div role="tabpanel" class="tab-pane fade" id="tab3-3">
                        <div class="row align-items-center">
                           <div class="col-md-6">
                              <div class="bg-light-4 text-center p-5">
                                 <h4>Based on {{ count($reviews)  }} @if(count($reviews)>1) Reviews @else Review @endif</h4>
                                 <h5>Average</h5>
                                 <h4>@if(count($reviews)>0){{ number_format((float)$totalReview/count($reviews), 1, '.', '')  }}@else 0.0 @endif</h4>
                                 <h6>({{count($reviews)}} @if(count($reviews)>1) Reviews @else Review @endif)</h6>
                              </div>
                           </div>
                           <div class="col-md-6 mt-3 mt-lg-0">
                              <div class="rating-list">
                                 <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap mr-3">
                                       <i class="fa fa-star" style="color: #FFC107;"></i>
                                       <i class="fa fa-star" style="color: #FFC107;"></i>
                                       <i class="fa fa-star" style="color: #FFC107;"></i>
                                       <i class="fa fa-star" style="color: #FFC107;"></i>
                                       <i class="fa fa-star" style="color: #FFC107;"></i>
                                    </div>
                                    <div class="w-100">
                                       <div class="progress" style="height: 5px;">
                                          <div class="progress-bar bg-success" role="progressbar" style="width: @if(count($reviews)>0){{($fiveReview*100)/count($reviews)}}%; @else 0% @endif" aria-valuenow="@if(count($reviews)>0){{($fiveReview*100)/count($reviews)}}@else 0 @endif" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                    <span class="text-muted ml-3">{{ $fiveReview }}</span>
                                 </div>
                                 <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap mr-3">
                                       <i class="fa fa-star" style="color: #FFC107;"></i>
                                       <i class="fa fa-star" style="color: #FFC107;"></i>
                                       <i class="fa fa-star" style="color: #FFC107;"></i>
                                       <i class="fa fa-star" style="color: #FFC107;"></i>
                                       <i class="fa fa-star"></i>
                                   </div>
                                    <div class="w-100">
                                       <div class="progress" style="height: 5px;">
                                          <div class="progress-bar bg-success" role="progressbar" style="width: @if(count($reviews)>0){{($fourReview*100)/count($reviews)}}%; @else 0% @endif" aria-valuenow="@if(count($reviews)>0){{($fourReview*100)/count($reviews)}}@else 0 @endif" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                    <span class="text-muted ml-3">{{ $fourReview }}</span>
                                 </div>
                                 <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap mr-3">
                                       <i class="fa fa-star" style="color: #FFC107;"></i>
                                       <i class="fa fa-star" style="color: #FFC107;"></i>
                                       <i class="fa fa-star" style="color: #FFC107;"></i>
                                       <i class="fa fa-star"></i>
                                       <i class="fa fa-star"></i>
                                    </div>
                                    <div class="w-100">
                                       <div class="progress" style="height: 5px;">
                                          <div class="progress-bar bg-success" role="progressbar" style="width: @if(count($reviews)>0){{($threeReview*100)/count($reviews)}}%; @else 0% @endif" aria-valuenow="@if(count($reviews)>0){{($threeReview*100)/count($reviews)}}@else 0 @endif" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                    <span class="text-muted ml-3">{{ $threeReview }}</span>
                                 </div>
                                 <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap mr-3">
                                       <i class="fa fa-star" style="color: #FFC107;"></i>
                                       <i class="fa fa-star" style="color: #FFC107;"></i>
                                       <i class="fa fa-star"></i>
                                       <i class="fa fa-star"></i>
                                       <i class="fa fa-star"></i>
                                    </div>
                                    <div class="w-100">
                                       <div class="progress" style="height: 5px;">
                                          <div class="progress-bar bg-warning" role="progressbar" style="width: @if(count($reviews)>0){{($twoReview*100)/count($reviews)}}%; @else 0% @endif" aria-valuenow="@if(count($reviews)>0){{($twoReview*100)/count($reviews)}}@else 0 @endif" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                    <span class="text-muted ml-3">{{ $twoReview }}</span>
                                 </div>
                                 <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap mr-3">
                                       <i class="fa fa-star" style="color: #FFC107;"></i>
                                       <i class="fa fa-star"></i>
                                       <i class="fa fa-star"></i>
                                       <i class="fa fa-star"></i>
                                       <i class="fa fa-star"></i>
                                    </div>
                                    <div class="w-100">
                                       <div class="progress" style="height: 5px;">
                                          <div class="progress-bar bg-danger" role="progressbar" style="width: @if(count($reviews)>0){{($oneReview*100)/count($reviews)}}%; @else 0% @endif" aria-valuenow="@if(count($reviews)>0){{($oneReview*100)/count($reviews)}}@else 0 @endif" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                    <span class="text-muted ml-3">{{ $oneReview }}</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="comment-area mt-5">
                           <div class="content_title">
                              <h4>Comments & Review</h4>
                           </div>
                           <ul class="list_none comment_list">
                              
                              @foreach($reviews as $review)
                              <li class="comment_info">
                                 <div class="d-flex">
                                    <div class="comment_user">
                                       <img src="{{ url('images/front_images/thumbnail/member1.png') }}" alt="user2">
                                    </div>
                                    <div class="comment_content">
                                       <div class="d-flex">
                                          <div class="meta_data">
                                             <h6><a href="#">{{ $review['user']['fname'] }}</a></h6>
                                             <div class="comment-time">{{ date('F d, Y, H:i A', strtotime($review['created_at'])) }}</div>
                                          </div>
                                          <div class="ml-auto">
                                             <a href="#" class="comment-reply"><i class="las la-arrow-left"></i> Reply</a>
                                          </div>
                                       </div>
                                       <spna>
                                          @for($i = 1 ;$i <= 5; $i++)
                                            @if($i <= $review['rating'])
                                            <i class="fa fa-star" style="color: #FFC107;"></i>
                                            @else
                                            <i class="fa fa-star"></i>
                                            @endif
                                          @endfor
                                       </span>
                                       <p>{{ $review['review'] }}</p>
                                    </div>
                                 </div>
                                 <!-- <ul class="children">
                                    <li class="comment_info">
                                       <div class="d-flex">
                                          <div class="comment_user">
                                             <img src="assets/images/thumbnail/member2.png" alt="user3">
                                          </div>
                                          <div class="comment_content">
                                             <div class="d-flex align-items-md-center">
                                                <div class="meta_data">
                                                   <h6><a href="#">Stephen Smith</a></h6>
                                                   <div class="comment-time">April 19, 2020, 01:45 PM</div>
                                                </div>
                                                <div class="ml-auto">
                                                   <a href="#" class="comment-reply"><i class="las la-arrow-left"></i> Reply</a>
                                                </div>
                                             </div>
                                             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, ex, quisquam. Nulla excepturi sint iusto incidunt sed omnis expedita, commodi dolores. Debitis nemo animi quia deleniti commodi nesciunt illo.</p>
                                          </div>
                                       </div>
                                    </li>
                                 </ul> -->
                              </li>
                              @endforeach
                           </ul>
                           <div class="mt-8 bg-light-4 rounded p-5">
                              <div class="section-title mb-3">
                                 <h4>Add a review</h4>
                              </div>
                              <form id="reviewSubmit" class="row" method="post" action="{{ url('product-rating') }}">
                              @csrf
                                 <input type="hidden" id="product_id" name="product_id" value="{{ $productDetails['id'] }}">
                                 <div class="form-group  col-12 rating">
                                    <input type="radio" name="rating" class="form-check-input star" value="1"><label><i class="fa fa-star"></i></label><br>
                                    <input type="radio" name="rating" class="form-check-input star" value="2"><label><i class="fa fa-star"></i><i class="fa fa-star"></i></label><br>
                                    <input type="radio" name="rating" class="form-check-input star" value="3"><label><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></label><br>
                                    <input type="radio" name="rating" class="form-check-input star" value="4"><label><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></label><br>
                                    <input type="radio" name="rating" class="form-check-input star" value="5"><label><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></label><br>
                                 </div>
                                 <div class="form-group col-12">
                                    <textarea name="review" id="review" class="form-control" placeholder="Write Your Review" rows="4" required data-error="Please,leave us a review."></textarea>
                                    <div class="help-block with-errors"></div>
                                 </div>
                                 <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-animated mt-1">Post Review</button>
                                 </div>
                              </form>
                           </div>
                           <div></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--tab end-->
   <!--recent product start-->
   <section class="pb-6 border-top pt-7">
      <div class="container">
         <div class="row justify-content-center text-center">
            <div class="col-lg-8 col-md-10">
               <div class="mb-5">
                  <h2 class="mb-0 font-w-6">Related Products</h2>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col">
               <div class="owl-carousel no-pb owl-2" data-dots="false" data-nav="true" data-items="4" data-md-items="2" data-sm-items="1">
                  @foreach($relatedProducts as $product)
                  <?php $image = App\ProductsImage::hoverImage($product['id']); ?>
                  <div class="item">
                     <div class="card product-card card--default">
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
                        <div class="card-icons">
                           <div class="card-icons__item"> <a class="add_to_wishlist" product-id="{{ $product['id'] }}" user-id="@if(Auth::check()){{Auth::user()->id}}@endif" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist" style="cursor: pointer;"> <i class="lar la-heart"></i> </a> </div>
                           <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                           <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                           <div class="card-body">
                              <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">{{ $product['product_name'] }}</a> </div>
                              <div class="mt-1">
                                 <span class="product-price text-pink"><del class="text-muted">$35.00</del> ${{ $product['product_price'] }}</span>
                                 <div class="star-rating">
                                     <img class="one" src="{{ url('images/product_images/small/rating.png') }}" alt="" style="clip: rect(0px,@if(count($reviews)>0){{($totalReview/count($reviews))*20}}px @else 0px @endif,50px,0px);">
                                     <img src="{{ url('images/product_images/small/rating_black.png') }}" alt="">
                                 </div>
                              </div>
                           </div>
                           <div class="card-footer bg-transparent border-0">
                              <div class="product-link d-flex align-items-center justify-content-center">
                                 <button class="btn-cart btn btn-pink mx-3" type="button"><i class="las la-shopping-cart mr-1"></i> Add to cart </button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
   
               </div>
            </div>
         </div>
      </div>
   </section>
   @include('layouts.front_layout.subscribe') 
</div>
@endsection

