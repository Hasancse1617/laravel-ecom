@extends('layouts.front_layout.front_layout')
@section('content')

<section class="bg-light py-6">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="h2 mb-0">Wishlist</h1>
      </div>
      <div class="col-md-6 mt-3 mt-md-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-md-end bg-transparent p-0 m-0">
            <li class="breadcrumb-item"><a class="link-title" href="#">Home</a>
            </li>
            <li class="breadcrumb-item"><a class="link-title" href="#">Shop</a></li>
            <li class="breadcrumb-item active text-primary" aria-current="page">Wishlist</li>
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

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive" id="appendWishlist">
          @include('front.wishlist.wishlist_items')
        </div>
        
      </div>
      
    </div>
    
  </div>
</section>


@include('layouts.front_layout.subscribe') 


</div>

@endsection