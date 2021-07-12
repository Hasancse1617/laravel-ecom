@extends('layouts.front_layout.front_layout')
@section('content')
<section class="bg-light py-6">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="h2 mb-0">{{ $categoryDetails['catDetails']['category_name'] }}</h1>
      </div>
      <div class="col-md-6 mt-3 mt-md-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-md-end bg-transparent p-0 m-0">
            <li class="breadcrumb-item"><a class="link-title" href="{{ url('/') }}">Home</a>
            </li>
            <li class="breadcrumb-item active text-primary" aria-current="page"><?php echo $categoryDetails['breadcrumb'] ?></li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- / .row -->
  </div>
  <!-- / .container -->
</section>

<div class="page-content">
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-12 order-lg-1">
        <div class="row">
          <div class="filter_wrapper">
            
          </div>
        </div>
        <div class="row mb-4 align-items-center">
          <div class="col-md-5 mb-3 mb-md-0"> <span class="text-dark show_of_shows">Showing 1 to {{ ($categoryProducts->perpage() > $categoryProducts->total())? $categoryProducts->total() : $categoryProducts->perpage()}} of  {{ $categoryProducts->total() }} total</span>
          </div>
          <div class="col-md-7 d-flex align-items-center justify-content-md-end">
            <div class="view-filter" id="grid_list"> 
              <a class="active grid" href="grid"><i class="las la-th-large"></i></a>
              <a class="list"><i class="las la-bars"></i></a>
            </div>
             <form name="sortProducts" id="sortProducts">
              <input type="hidden" name="url" id="url" value="{{ $url }}">
              <div class="sort-filter ml-2 d-flex align-items-center">
                <select class="custom-select" name="sort" id="sort">
                  <option value="" selected>Default sorting</option>
                  <option value="product_latest">Newest Item</option>
                  <option value="product_name_a_z">Product Name A-Z</option>
                  <option value="product_name_z_a">Product Name A-Z</option>
                  <option value="price_lowest">Lowest Price First</option>
                  <option value="price_highest">Highest Price First</option>
                </select>
              </div>
            </form>
            <form name="showProducts" id="showProducts">
              <div class="sort-filter ml-2 d-flex align-items-center">
                <select class="custom-select" name="show_more" id="show_more">
                  <option value="2" selected>Show</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                </select>
              </div>
            </form>
          </div>
        </div>
        <span class="filter_products">
             @include('front.products.ajax_products_listing')
        </span>
          
      </div>

      @include('layouts.front_layout.front_sidebar')

    </div>
  </div>
</section>

@include('layouts.front_layout.subscribe')

</div>
@endsection