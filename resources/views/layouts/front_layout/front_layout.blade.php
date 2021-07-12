<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themesground.com/flipmarto/demo/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Sep 2020 13:48:00 GMT -->
<head>

<!-- meta tags -->
<meta charset="utf-8">
<meta name="keywords" content="bootstrap 4, premium, multipurpose, ecommerce, html5, css" />
<meta name="description" content="Bootstrap 4 Landing Page Template" />
<meta name="author" content="www.themesground.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}" />

<link href="{{ url('css/front_css/jquery-ui.css') }}" rel="stylesheet" media="screen"/>
<!-- Title -->
<title>Flipmarto - Multi-purpose E-commerce Html5 Template</title>

<!-- Favicon Icon -->
<link rel="shortcut icon" href="{{ asset('images/front_images/favicon.png') }}" />

<!-- inject css start -->
<link rel="stylesheet" href="{{ url('plugins/select2/css/select2.min.css') }}">
<link href="{{ asset('css/front_css/theme-plugin.css') }}" rel="stylesheet" />
<link href="{{ asset('css/front_css/theme.min.css') }}" rel="stylesheet" />

<!-- inject css end -->
<script src="{{ asset('js/front_js/jquery-3.5.1.min.js') }}"></script>
</head>

<body>

<!-- page wrapper start -->

<div class="page-wrapper"> 
	<!-- preloader start -->
	<div id="ht-preloader">
	  <div class="loader clear-loader">
	    <img class="img-fluid" src="{{ asset('images/front_images/loader.gif') }}" alt="">
	  </div>
	</div>
<!-- preloader end -->
  <!--header start-->
  @include('layouts.front_layout.front_header')
  
  <!--header end--> 
  
  <!--hero section start-->
  
 @yield('content')
  
  <!--body content end--> 
  
  <!--footer start-->
  
  @include('layouts.front_layout.front_footer')
  
  <!--footer end--> 
  
</div>

<!-- page wrapper end --> 



<!-- Quick View Modal -->
<div class="modal fade view-modal" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <button type="button" class="close-quickview" data-dismiss="modal" aria-label="Close"> <i class="ion-ios-close-empty"></i> </button>
      <div class="modal-body">
        <div class="row align-items-center">
          <div class="col-lg-5 col-12"> <img class="img-fluid rounded" src="assets/images/product/p11.jpg" alt="" /> </div>
          <div class="col-lg-7 col-12 mt-5 mt-lg-0">
            <div class="product-details">
          <h1 class="h4 mb-0 font-w-6">Unpaired Running Shoes</h1>
          <div class="star-rating mb-4"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i>
          </div> <span class="product-price h5 text-pink">$25.00 <del class="text-muted h6">$35.00</del></span>
          <ul class="list-unstyled my-3">
            <li><small>Availibility: <span class="text-green"> In Stock</span> </small>
            </li>
            <li class="font-w-4"><small>Categories :<span class="text-muted"> womens, clothing, dresses, footwear</span></small>
            </li>
          </ul>
          <p class="mb-4 desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. vulputate adipiscing cursus eu, suscipit id nulla. quis fermentum turpis eros eget velit.</p>
          <div class="d-sm-flex align-items-center mb-5">
            <div class="d-flex align-items-center mr-sm-4">
              <button class="btn-product btn-product-up"> <i class="las la-minus"></i>
              </button>
              <input class="form-product" type="number" name="form-product" value="1">
              <button class="btn-product btn-product-down"> <i class="las la-plus"></i>
              </button>
            </div>
            <select class="custom-select mt-3 mt-sm-0" id="inputGroupSelect02">
              <option selected>Size</option>
              <option value="1">XS</option>
              <option value="2">S</option>
              <option value="3">M</option>
              <option value="3">L</option>
              <option value="3">XL</option>
              <option value="3">XXL</option>
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
            <button class="btn btn-primary btn-animated mr-sm-3 mb-3 mb-sm-0"><i class="las la-shopping-cart mr-2"></i>Add To Cart</button>
            <a class="btn btn-animated btn-dark" href="#"> <i class="lar la-heart mr-2 ic-1-2x"></i>Add To Wishlist
            </a>
          </div>
          
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--back-to-top start-->

<div class="scroll-top"><a class="smoothscroll" href="#top"><i class="las la-angle-up"></i></a></div>

<!--back-to-top end--> 

<!-- inject js start --> 

<!-- Select2 -->
<script src="{{ url('plugins/select2/js/select2.full.min.js')}}"></script>
<script>
  //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
</script> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('js/front_js/popper.min.js') }}"></script> 
<script src="{{ asset('js/front_js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/front_js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('js/front_js/light-slider.js') }}"></script> 
<script src="{{ asset('js/front_js/parallax.js') }}"></script> 
<script src="{{ asset('js/front_js/magnific-popup.min.js') }}"></script> 
<script src="{{ asset('js/front_js/jquery.countdown.min.js') }}"></script> 
<script src="{{ asset('js/front_js/jquery.dd.min.js') }}"></script> 
<script src="{{ asset('js/front_js/validator.js') }}"></script> 
<script src="{{ asset('js/front_js/wow.js') }}"></script> 
<script src="{{ asset('js/front_js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/front_js/jquery.validate.min.js') }}"></script> 
<script src="{{ asset('js/front_js/jquery.elevatezoom.js') }}"></script> 
<script src="{{ asset('js/front_js/theme-script.js') }}"></script> 
<script src="{{ asset('js/front_js/front_scripts.js') }}"></script> 

<!-- inject js end -->
</body>

<!-- Mirrored from themesground.com/flipmarto/demo/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Sep 2020 13:55:34 GMT -->
</html>
