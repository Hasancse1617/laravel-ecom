@extends('layouts.front_layout.front_layout')
@section('content')
<?php 
    use App\Banner;
    $getBanners = Banner::getBanners();
 ?>
 <section class="banner pos-r p-0">
    <div class="banner-slider home-slide owl-carousel no-pb owl-2" data-dots="true" data-nav="false">
      @foreach($getBanners as $banner)
      <div class="item bg-pos-ct" data-bg-img="{{ asset('images/banner_images/'.$banner['image']) }}">
        <div class="container h-100">
          <div class="row h-100 align-items-center">
            <div class="col-lg-7 col-md-12 custom-py-2 position-relative z-index-1">
              <h6 class="font-w-6 text-black animated3">{{ $banner['subtitle'] }}</h6>
              <h1 class="mb-4 animated3 text-black">{{ $banner['title'] }}</h1>
              <div class="animated3"> <a class="btn bg-pink-btn rounded-0" href="{{ $banner['link'] }}">{{ $banner['btn_text'] }}</a> </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>
  
  <!--hero section end-->
  
  <section class="banner-row full pt-4 pb-0">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-lg-4 col-md-6">
          <div class="position-relative rounded overflow-hidden"> 
            <!-- Background --> 
            <img class="img-fluid hover-zoom" src="{{ asset('images/front_images/product-ad/01.jpg') }}" alt=""> 
            <!-- Body -->
            <div class="position-absolute top-50 pl-5">
              <h6 class="text-dark">Digital World</h6>
              <!-- Heading -->
              <h3 class="text-dark font-w-7">Exchange <br>
                Deals</h3>
              <!-- Link --> <a class="more-link text-dark" href="#">Shop Now </a> </div>
          </div>
        </div>
        <div class="col-12 col-lg-4 col-md-6 mt-5 mt-md-0">
          <div class="position-relative rounded overflow-hidden"> 
            <!-- Background --> 
            <img class="img-fluid hover-zoom" src="{{ asset('images/front_images/product-ad/02.jpg') }}" alt=""> 
            <!-- Body -->
            <div class="position-absolute top-50 pl-5">
              <h6 class="text-dark">Todays Deals</h6>
              <!-- Heading -->
              <h3 class="font-w-7 text-dark">Accessories <br>
                Special</h3>
              <!-- Link --> <a class="more-link text-dark" href="#">Shop Now </a> </div>
          </div>
        </div>
        <div class="col-12 col-lg-4 col-md-12 mt-5 mt-lg-0 d-md-none d-lg-block">
          <div class="position-relative rounded overflow-hidden"> 
            <!-- Background --> 
            <img class="img-fluid hover-zoom" src="{{ asset('images/front_images/product-ad/03.jpg') }}" alt=""> 
            <!-- Body -->
            <div class="position-absolute top-50 pl-5">
              <h6 class="text-dark">Hot Deals</h6>
              <!-- Heading -->
              <h3 class="font-w-7">Handbags<br>
                Design</h3>
              <!-- Link --> <a class="more-link text-dark" href="#">Shop Now </a> </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!--body content start-->
  
  <div class="page-content"> 
    
    <!--product start-->
    
    <section class="pb-6">
      <div class="container">
        <div class="row justify-content-center text-center mb-4">
          <div class="col-lg-6 col-md-10">
            <div>
              <h2 class="mb-0 font-w-6">New Products</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="tab">
              <nav class="mb-5 text-center">
                <div class="nav nav-tabs nav-tabs-div d-inline-block justify-content-md-end" id="nav-tab" role="tablist"> <a class="nav-item nav-link" id="nav-tab2" data-toggle="tab" href="#tab1-2" role="tab" aria-selected="true">Top Rated</a> <a class="nav-item nav-link  active" id="nav-tab1" data-toggle="tab" href="#tab1-1" role="tab" aria-selected="false">Best Seller</a> <a class="nav-item nav-link" id="nav-tab3" data-toggle="tab" href="#tab1-3" role="tab" aria-selected="false">Special</a> </div>
              </nav>
              <div class="tab-content p-0" id="nav-tabContent">
                
                <div role="tabpanel" class="tab-pane fade show active" id="tab1-1">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default rounded-0">
                        <div class="sale-label">-15%</div>
                        <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-back" src="{{ asset('images/front_images/product/p10.jpg') }}" alt="..."> <img class="card-img-front" src="{{ asset('images/front_images/product/p10_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                          <div class="product_color_switch">
                          <span class="active" data-color="#3e3e40" style="background-color:#3e3e40" data-toggle="tooltip" data-placement="top" title="" data-original-title="Black"></span>
                           <span data-color="#ac4e10" style="background-color:#ac4e10" data-toggle="tooltip" data-placement="top" title="" data-original-title="Brown"></span>
                            <span data-color="#e8e7e5" style="background-color:#e8e7e5" data-toggle="tooltip" data-placement="top" title="" data-original-title="Grey"></span>
                                            </div>
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default rounded-0"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-back" src="{{ asset('images/front_images/product/p13.jpg') }}" alt="..."> <img class="card-img-front" src="{{ asset('images/front_images/product/p13_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p11.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p11_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                          <div class="product_img_switch">
                          <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Black Bag"><img src="{{ asset('images/front_images/product/switch/01.jpg') }}" alt="..."></span>
                          <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Brown Bag"><img src="{{ asset('images/front_images/product/switch/02.jpg') }}" alt="..."></span>
                          <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Grey Bag"><img src="{{ asset('images/front_images/product/switch/03.jpg') }}" alt="..."></span>
                           </div>
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default">
                        <div class="new-label">New</div>
                        <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p15.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p15_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                          <ul class="countdown list-inline d-flex p-0 justify-content-center" data-countdown="2021/05/23"></ul>
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                         <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p8.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p8_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default">
                        <div class="hot-label">Hot</div>
                        <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p5.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p5_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p3.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p3_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p6.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p6_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                  </div>
                </div>
                
                <div role="tabpanel" class="tab-pane fade show" id="tab1-2">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p2.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p2_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p9.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p9_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p4_hover.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p4.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p14.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p14_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p10.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p10_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p11.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p11_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p12.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p12_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p7.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p7_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-6"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                  </div>
                </div>
                
                <div role="tabpanel" class="tab-pane fade show" id="tab1-3">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p15.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p15_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p5.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p5_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p3.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p3_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p11.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p11_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p8.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p8_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p13.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p13_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p1_hover.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p1.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                      <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p6.jpg') }}" alt="..."> <img class="card-img-top card-img-front" src="{{ asset('images/front_images/product/p6_hover.jpg') }}" alt="..."> </a>
                        <div class="card-icons">
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"> <i class="lar la-heart"></i> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                          <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"> <i class="las la-random"></i> </a> </div>
                        </div>
                        <div class="card-info">
                          <div class="card-body">
                            <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                            <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                              <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--product end--> 
    
    <!--feature start-->
    
    <section class="bg-pink-light pt-8 pb-8">
      <div class="container"> 
        <!-- / .row -->
        <div class="row text-center">
          <div class="col-lg-4 col-sm-6">
            <div class="mx-10"> <i class="las la-truck ic-2x text-dark"></i>
              <h5 class="mb-1">We ship worldwide on order over $99</h5>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 mt-3 mt-sm-0">
            <div class="mx-10"> <i class="las la-wallet ic-2x text-dark"></i>
              <h5 class="mb-1">Safe, superfast & secure payment gateways</h5>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12 mt-3 mt-lg-0">
            <div class="mx-10"> <i class="las la-mobile ic-2x text-dark"></i>
              <h5 class="mb-1">Call for styling advice on +123 1234 5678</h5>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--feature end--> 
    
    <!--product start-->
    
    <section class="pb-5">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="bg-white">
              <div class="row justify-content-center text-center mb-4">
                <div class="col-lg-8 col-md-10">
                  <div>
                    <h2 class="mb-0 font-w-6">Featured Products ({{ $featuredItemCount }})</h2>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="owl-carousel no-pb owl-2" data-dots="false" data-nav="true" data-items="4" data-md-items="2" data-sm-items="2">
                  @foreach($featureItems as $item)
                  <?php $image = App\ProductsImage::hoverImage($item['id']); ?>
                  <?php $discounted_price = App\Product::getDiscountedPrice($item['id']); ?>
                  <div class="item">
                    <div class="card product-card card--default">
                    @if($discounted_price['discount'] > 0)<div class="sale-label">-{{ $discounted_price['discount'] }}%</div>@endif 
                      <a class="card-img-hover d-block" href="{{ url('/product/'.$item['id']) }}">
                         <?php $image_path = "images/product_images/small/".$item['main_image']; ?>
                         @if(!empty($item['main_image']) && file_exists($image_path))
                         <img class="card-img-top card-img-back" src="{{ asset('images/product_images/small/'.$item['main_image']) }}" alt="..."> 
                         @else
                         <img class="card-img-top card-img-back" src="{{ asset('images/product_images/small/no-image.jpg') }}" alt="..."> 
                         @endif
                         <!-- Hover Image -->
                         @if(!empty($image->image))
                         <img class="card-img-front" src="{{ asset('images/product_images/small/'.$image->image) }}" alt="...">
                         @endif
                         
                     </a>
                      <div class="card-icons">
                        <div class="card-icons__item"> <a class="add_to_wishlist" product-id="{{ $item['id'] }}" user-id="@if(Auth::check()){{Auth::user()->id}}@endif" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist" style="cursor: pointer;"> <i class="lar la-heart"></i> </a> </div>
                        <div class="card-icons__item"> <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><span data-target="#quick-view" data-toggle="modal"> <i class="ion-ios-search-strong"></i></span> </a> </div>
                        <div class="card-icons__item"> <a class="add_to_compare" product-id="{{ $item['id'] }}" user-id="@if(Auth::check()){{Auth::user()->id}}@endif" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare" style="cursor: pointer;"> <i class="las la-random"></i> </a> </div>
                      </div>
                      <div class="card-info">
                        <div class="card-body">
                        <div class="product_color_switch">
                      <span data-color="#3e3e40" style="background-color:#3e3e40" data-toggle="tooltip" data-placement="top" title="" data-original-title="Black"></span>
                        <span data-color="#ac4e10" style="background-color:#ac4e10" data-toggle="tooltip" data-placement="top" title="" data-original-title="Brown"></span>
                       <span data-color="#e8e7e5" style="background-color:#e8e7e5" data-toggle="tooltip" data-placement="top" title="" data-original-title="Grey"></span>
                                            </div>
                          <div class="product-title font-w-5"><a class="link-title" href="{{ url('/product/'.$item['id']) }}">{{ $item['product_name'] }}</a> </div>
                          <div class="mt-1"> 
                            @if($discounted_price['discounted_price'] > 0)
                            <span class="product-price text-pink"><del class="text-muted">${{ $item['product_price'] }}</del> ${{ $discounted_price['discounted_price'] }}</span>
                            @else
                            <span class="product-price text-pink"> ${{ $item['product_price'] }}</span>
                            @endif
                             <?php 
                               $reviews = App\Review::reviews($item['id']);
                               $totalReview = App\Review::where('status',1)->where('product_id',$item['id'])->sum('rating');
                             ?>
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
        </div>
      </div>
    </section>
    
    <!--product end--> 
    
    <!--hot deal start-->
    
    <section class="bg-pos-ct bg-xs-none hot-deal-1 bg-light-4" data-bg-img="{{ asset('images/front_images/bg/05.jpg') }}">
      <div class="container position-relative">
        <div class="row">
          <div class="col-lg-6 col-md-10">
            <div>
              <h6 class="text-pink mb-4 font-w-5 border-bottom-pink"> Limited Time Offer </h6>
              <h2 class="font-w-6">Casual with pockets</h2>
              <div class="color-availblity">Colors : <span class="yellow-round"></span> <span class="purple-round"></span> <span class="green-round"></span></div>
              <p>Fusce ac pharetra urna. Duis non lacus sit amet lacus interdum facilisis sed non est. Ut mi metus, semper eu dictum nec, condimentum sed sapien.</p>
              <h7>Only $29.99</h7>
            </div>
            <ul class="countdown list-inline d-flex mt-5 mb-0 p-0" data-countdown="2022/09/23">
            </ul>
          </div>
          <div class="myDIV"><a href="product-left-image.html"><i class="las la-plus"></i></a></div>
          <div class="hide">
            <div class="card product-card card--default"> <a class="card-img-hover d-block" href="product-left-image.html"> <img class="card-img-top card-img-back" src="{{ asset('images/front_images/product/p3.jpg') }}" alt="..."> </a>
              <div class="card-info">
                <div class="card-body pb-0">
                  <div class="product-title font-w-5"><a class="link-title" href="product-left-image.html">Unpaired Running Shoes</a> </div>
                  <div class="mt-1"> <span class="product-price text-pink"><del class="text-muted">$35.00</del> $25.00</span>
                    <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--hot deal end--> 
    
    <!--blog start-->
    
    <section>
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-12 col-md-10 col-lg-8">
            <div>
              <h2 class="mb-0 font-w-6">Latest From Blog</h2>
            </div>
          </div>
        </div>
        <?php $blogs = App\Blog::blogs()->take(3); ?>
        <!-- / .row -->
        <div class="row">
          @foreach($blogs as $blog)
          <div class="col-12 col-lg-4 mt-5 mt-lg-0"> 
            <!-- Blog Card -->
            <div class="card border-0 bg-transparent">
              <div class="position-relative rounded overflow-hidden">
                @if(file_exists('images/post_images/'.$blog->thumbnail))
                <span class="featured-icon"><i class="las la-image"></i></span>
                <img class="card-img-top hover-zoom" src="{{ url('images/post_images/'.$blog->thumbnail) }}" alt="Image"> 
                @elseif(file_exists('videos/post_videos/'.$blog->thumbnail))
                <span class="featured-icon"><i class="las la-play"></i></span>
                <video id="clip1" class="rounded" width="100%" muted="" autoplay preload="" loop poster="{{ asset('images/front_images/blog/video-image.jpg') }}"  style="object-fit: cover; min-height:240px; z-index: -100;">
                  <source src="{{url('videos/post_videos/'.$blog->thumbnail)}}" type="video/mp4">
                </video>
                @elseif(file_exists('audios/post_audios/'.$blog->thumbnail))
                <span class="featured-icon"><i class="las la-volume-up"></i></span>
                <div class="loader-container">
                  <div class="rectangle-1"></div>
                  <div class="rectangle-2"></div>
                  <div class="rectangle-3"></div>
                  <div class="rectangle-4"></div>
                  <div class="rectangle-5"></div>
                  <div class="rectangle-6"></div>
                  <div class="rectangle-5"></div>
                  <div class="rectangle-4"></div>
                  <div class="rectangle-3"></div>
                  <div class="rectangle-2"></div>
                  <div class="rectangle-1"></div>
                </div>
                <audio controls autoplay style="object-fit: cover; width:100%">
                  <source src="{{url('audios/post_audios/'.$blog->thumbnail)}}" type="audio/mpeg">
                </audio>
                @endif
              </div>
              <div class="card-body px-0 pb-0">
                <div> <span class="date text-pink">{{ date('d F', strtotime($blog->created_at)) }}</span>
                 <?php $tag_count = count($blog->tag_id);  ?>
                  @foreach($blog->tag_id as $index => $tag)
                   @if($tag_count > $index+1) 
                   <a class="d-inline-block link-title btn-link text-small" href="{{ url('blog-tag/'.str_replace(' ','+',strtolower($tag))) }}">{{$tag}},</a>
                    @else
                   <a class="d-inline-block link-title btn-link text-small" href="{{ url('blog-tag/'.str_replace(' ','+',strtolower($tag))) }}">{{$tag}}</a> 
                   @endif
                  @endforeach  
               </div>
                <h2 class="h5 font-w-5 mt-2 mb-0"> <a class="link-title" href="{{ url('blog-detail/'.str_replace(' ','+',strtolower($blog->slug))) }}">{{ $blog->title }}</a> </h2>
              </div>
              <div></div>
            </div>
            <!-- End Blog Card --> 
          </div>
          @endforeach

        </div>
      </div>
    </section>
        
    @include('layouts.front_layout.subscribe')
    
  </div>
 @endsection