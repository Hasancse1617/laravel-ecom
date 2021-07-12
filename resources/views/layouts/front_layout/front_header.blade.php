<?php 
    use App\Section;
    $sections = Section::sections();
    // dd($sections);
 ?>
<header class="site-header header-1">
    <div class="header-top bg-dark-1 py-0">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 d-flex align-items-center justify-content-between text-white">
            <div class="d-md-flex align-items-center call-info">
              <div class="d-flex align-items-center">
                <div class="text-white offer-text"><small><span>60%</span> discount on womens collection</small> </div>
                <div class="language-selection">
                  <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                    <div class="ml-3 mr-3">
                      <select name="countries" class="custome_select">
                        <option value='USD' data-title="USD">USD</option>
                        <option value='EUR' data-title="EUR">EUR</option>
                        <option value='GBR' data-title="GBR">GBR</option>
                      </select>
                    </div>
                    <div class="lng_dropdown">
                      <select name="countries" class="custome_select">
                        <option value='en' data-image="{{ asset('images/front_images/eng.png') }}" data-title="English">English</option>
                        <option value='fn' data-image="{{ asset('images/front_images/fn.png') }}" data-title="France">France</option>
                        <option value='us' data-image="{{ asset('images/front_images/us.png') }}" data-title="United States">United States</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-none d-md-flex align-items-center">
              <div class="social-icons">
                <ul class="list-inline mb-0">
                  <li class="list-inline-item"><a class="text-white" href="#"><i class="lab la-facebook-f"></i></a> </li>
                  <li class="list-inline-item"><a class="text-white" href="#"><i class="lab la-twitter"></i></a> </li>
                  <li class="list-inline-item"><a class="text-white" href="#"><i class="lab la-linkedin-in"></i></a> </li>
                  <li class="list-inline-item"><a class="text-white" href="#"><i class="lab la-instagram"></i></a> </li>
                  <li class="list-inline-item"><a class="text-white" href="#"><i class="lab la-pinterest-p"></i></a> </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="header-wrap">
      <div class="container">
        <div class="row"> 
          <!--menu start-->
          <div class="col">
            <nav class="navbar navbar-expand-lg navbar-light position-static"> <a class="navbar-brand logo" href="{{ url('/') }}"> <img class="img-fluid" src="{{ asset('images/front_images/logo.png') }}" alt=""> </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto mr-auto">
                  <li class="nav-item"> <a class="nav-link {{ (Session::get('page')=="index")? 'active' : ''}}" href="{{ url('/') }}">Home</a></li>
                  <li class="nav-item dropdown position-static"> <a class="nav-link dropdown-toggle {{ (Session::get('page')=="listing")? 'active' : ''}}" href="#">Categories</a>
                    <div class="dropdown-menu w-100"> 
                      <!-- Tabs -->
                      <div class="container p-0">
                        <div class="row w-100 no-gutters">
                          <div class="col-lg-9 p-lg-3">
                            <div class="row">
                              @foreach($sections as $section)
                              @if(count($section['categories']) > 0)
                              <div class="col-12 col-md-3 col-sm-6"> 
                                <!-- Heading -->
                                <div class="mb-2 font-w-5 text-link">{{ $section['name'] }}</div>
                                <!-- Links -->
                                @foreach($section['categories'] as $category)
                                <ul class="list-unstyled mb-6 mb-md-0">
                                  <li> <a href="{{ url($category['url']) }}">{{ $category['category_name'] }}</a></li>
                                  @foreach($category['subcategories'] as $subcategory)
                                  <li> <a href="{{ url($subcategory['url']) }}#">&nbsp;&nbsp;--{{ $subcategory['category_name'] }}</a></li>
                                  @endforeach
                                </ul>
                                @endforeach
                              </div>
                              @endif
                              @endforeach
                            </div>
                          </div>
                          <!-- <div class="col-lg-4 d-none d-lg-block pr-2"> <img class="img-fluid rounded-bottom rounded-top" src="{{ asset('images/front_images/header-img.jpg') }}" alt="..."> </div> -->
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="nav-item dropdown position-static"> <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Shop</a>
                    <div class="dropdown-menu w-100 custom-drop">
                      <div class="container p-0">
                        <div class="row w-100 no-gutters">
                          <div class="col-12 col-md-4 p-lg-3"> 
                            <!-- Heading -->
                            <div class="mb-2 font-w-5 text-link">Shop Layout</div>
                            <!-- Links -->
                            <ul class="list-unstyled mb-6 mb-md-0">
                              <li> <a href="product-grid.html">Product Grid</a> </li>
                              <li> <a href="product-grid-left-sidebar.html">Product Grid Left Sidebar</a> </li>
                              <li> <a href="product-grid-right-sidebar.html">Product Grid Right Sidebar</a> </li>
                              <li> <a href="product-list.html">Product List</a> </li>
                              <li> <a href="product-list-left-sidebar.html">Product List Left Sidebar</a> </li>
                              <li> <a href="product-list-right-sidebar.html">Product List Right Sidebar</a> </li>

                            </ul>
                          </div>
                          <div class="col-12 col-md-4 p-lg-3"> 
                            <!-- Heading -->
                            <div class="mb-2 font-w-5 text-link">Product Pages</div>
                            <!-- Links -->
                            <ul class="list-unstyled mb-6 mb-md-0">
                              <li> <a href="product-default.html">Product Default</a> </li>
                              <li> <a href="product-default-right-image.html">Product Default Right Image</a> </li>
                              <li> <a href="product-left-image.html">Product Left Image</a> </li>
                              <li> <a href="product-right-image.html">Product Right Image</a> </li>
                              <li> <a href="product-left-sidebar.html">Product Left Sidebar</a> </li>
                              <li> <a href="product-right-sidebar.html">Product Right Sidebar</a> </li>

                            </ul>
                          </div>
                          <div class="col-12 col-md-4 p-lg-3"> 
                            <!-- Heading -->
                            <div class="mb-2 font-w-5 text-link">Other Pages</div>
                            <!-- Links -->
                            <ul class="list-unstyled mb-6 mb-md-0">
                              <li> <a href="shopping-cart.html">Shopping Cart</a> </li>
                              <li> <a href="checkout.html">Checkout</a> </li>
                              <li> <a href="my-account.html">My Account</a> </li>
                              <li> <a href="wishlist.html">Wishlist</a> </li>
                              <li> <a href="compare.html">Compare</a> </li>
                              <li> <a href="order-complete.html">Order Completed</a> </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Pages</a>
                    <ul class="dropdown-menu">
                      <li> <a href="about-us.html">About Us</a> </li>
                      <li> <a href="login.html">Login</a> </li>
                      <li> <a href="signup.html">Signup</a> </li>
                      <li> <a href="forgot-password.html">Forgot Password</a> </li>
                      <li> <a href="coming-soon.html">Coming Soon</a> </li>
                      <li> <a href="error-404.html">404 Error</a> </li>
                      <li> <a href="faq.html">FAQ</a> </li>
                      <li> <a href="privacy-policy.html">Privacy Policy</a> </li>
                      <li> <a href="terms-and-conditions.html">Term & Conditions</a> </li>
                    </ul>
                  </li>
                  <li class="nav-item"> <a class="nav-link @if(Session::get('page')=="blogs") active @endif" href="{{ url('/blogs') }}">Blog</a>
                  </li>
                  <li class="nav-item"> <a class="nav-link" href="contact-us.html">Contact</a> </li>
                </ul>
              </div>
              <div class="right-nav align-items-center d-flex justify-content-end">
                <div class="mr-1 mr-sm-3 search-block"> <a href="javascript:void(0);" class="search_trigger ml-3"><i class="las la-search"></i></a>
                  <div class="search_wrap container"> <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                    <form>
                      <input type="text" placeholder="Search" class="form-control" id="search_input">
                      <button type="submit" class="search_icon"><i class="las la-search"></i></button>
                    </form>
                  </div>
                </div>
                @if(Auth::check())
                <a class="mr-1 mr-sm-3" href="{{ url('/account') }}"><i class="las la-user-alt"></i></a>
                @else
                <a class="mr-1 mr-sm-3" href="{{ url('/login') }}">Login</a>
                @endif
                <a class="mr-3 d-none d-sm-inline" href="{{ url('/wishlist') }}"><span class="bg-white pr-2 pl-0 py-1 rounded totalWishlists" data-cart-items="{{ totalWishlists() }}"><i class="lar la-heart"></i></span></a>
                <div  class="dropdown cart_dropdown"> <a class="d-flex align-items-center" href="{{ url('/cart') }}"> <span class="bg-white pr-2 pl-0 py-1 rounded totalCartItems" data-cart-items="{{ totalCartItems() }}"> <i class="las la-shopping-bag"></i> </span> </a>
                  <div id="appendMiniCartItems" class="cart_box dropdown-menu dropdown-menu-right">
                     @include('layouts.front_layout.mini_cart_items')
                  </div>
                </div>
              </div>
            </nav>
          </div>
          <!--menu end--> 
        </div>
      </div>
    </div>
  </header>