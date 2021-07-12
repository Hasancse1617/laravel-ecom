@extends('layouts.front_layout.front_layout')
@section('content')
      <!--hero section start-->
      <section class="bg-light py-6">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6">
              <h1 class="h2 mb-0">My Account</h1>
            </div>
            <div class="col-md-6 mt-3 mt-md-0">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-md-end bg-transparent p-0 m-0">
                  <li class="breadcrumb-item"><a class="link-title" href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a class="link-title" href="#">Shop</a></li>
                  <li class="breadcrumb-item active text-primary" aria-current="page">My Account</li>
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
        <section class="dashboard-page">
          <div class="container">
            <div class="row">
              <div class="col-lg-3 col-md-4">
                <div class="dashboard_menu">
                  <ul class="nav nav-tabs border-0 flex-column" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false">
                      Dashboard</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">
                      My Orders</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true">
                      My Address</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="account-detail-tab" data-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true">
                      Account details</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-9 col-md-8 mt-5 mt-lg-0 mt-md-0">
              {{@$tab}}
              @if(Session::has('success_message'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                 {{ Session::get('success_message') }}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               @endif

                <div class="tab-content dashboard_content">
                  <div class="tab-pane fade" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                    <div class="card border-0">
                      <div class="card-body">
                        <div class="welcome-msg">
                          <h6>Hello, {{ Auth::user()->dname }}!</h6>
                          <p>From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>
                        </div>
                      </div>
                    </div>
                  </div>

                  @include('front.users.orders')
                  
                  @include('front.users.addresses')
                  
                  @include('front.users.account-details')
                
                </div>
              </div>
            </div>
          </div>
        </section>
        @include('layouts.front_layout.subscribe') 
        <!--multi sec end--> 
      </div>
@endsection