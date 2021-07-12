@extends('layouts.front_layout.front_layout')
@section('content')

<section class="bg-light py-6">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="h2 mb-0">Order Completed</h1>
      </div>
      <div class="col-md-6 mt-3 mt-md-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-md-end bg-transparent p-0 m-0">
            <li class="breadcrumb-item"><a class="link-title" href="#">Home</a>
            </li>
            <li class="breadcrumb-item"><a class="link-title" href="#">Shop</a></li>
            <li class="breadcrumb-item active text-primary" aria-current="page">Order Completed</li>
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

<section class="text-center pb-11">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="mb-4 font-w-6">Thank you for purchasing, Your order is completed!</h4>
        <h4 class="mb-4 font-w-6">Your order number is #{{ Session::get('order_id') }}</h4>
        <a class="btn btn-primary btn-animated" href="{{ url('/checkout') }}">Back</a>
        <a class="btn btn-dark btn-animated" href="{{ url('/') }}">Continue Shopping</a>      
      </div>
    </div>
  </div>
</section>

@include('layouts.front_layout.subscribe') 

</div>

@endsection
<?php 
   Session::forget('grand_total');
   Session::forget('order_id');
 ?>