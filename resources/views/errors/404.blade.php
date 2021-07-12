@extends('layouts.front_layout.front_layout')
@section('content')


<div class="page-content">

<!--login start-->

<section class="bg-light">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-10 col-lg-6 col-md-10 col-sm-10 error-page">
        <h2>404</h2>
        <h4>We are sorry, the page you've requested is not available. </h4>
        <div class="search-form">
              <form id="mc-form" class="row align-items-center no-gutters mb-3">
                <div class="col">
                  <input value="" name="search" class="email form-control input-2 bg-white" placeholder="Search" required type="text">
                </div>
                <div class="col-auto">
                  <input class="btn btn-primary overflow-auto" name="subscribe" value="Go" type="submit">
                </div>
              </form>
            </div>
      </div>
    </div>
  </div>
</section>

@include('layouts.front_layout.subscribe')

</div>

@endsection