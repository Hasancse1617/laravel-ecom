@extends('layouts.admin_layout.admin_layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

        <div class="col-12">
         @if(Session::has('success_message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
        </div>

          <div class="col-sm-6">
            <h1>Catelogues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order #{{ $orderDetails['id'] }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><strong>Order Details</strong></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td><strong>Order Date</strong></td>
                      <td>{{ date('F d, Y', strtotime($orderDetails['created_at'])) }}</td>
                    </tr>
                    <tr>
                      <td><strong>Order Status</strong></td>
                      <td>{{ $orderDetails['order_status'] }}</td>
                    </tr>
                    @if(!empty($orderDetails['courier_name']))
                    <tr>
                      <td><strong>Courier Name</strong></td>
                      <td>{{ $orderDetails['courier_name'] }}</td>
                    </tr>
                    @endif
                    @if(!empty($orderDetails['tracking_number']))
                    <tr>
                      <td><strong>Tracking Number</strong></td>
                      <td>{{ $orderDetails['tracking_number'] }}</td>
                    </tr>
                    @endif
                    <tr>
                      <td><strong>Order Total</strong></td>
                      <td>${{ $orderDetails['grand_total'] }}</td>
                    </tr>
                    <tr>
                      <td><strong>Shipping Charges</strong></td>
                      <td>${{ $orderDetails['shipping_charge'] }}</td>
                    </tr>
                    <tr>
                      <td><strong>Coupon Code</strong></td>
                      <td>@if(!empty($orderDetails['coupon_code'])) {{ $orderDetails['coupon_code'] }} @endif</td>
                    </tr>
                    <tr>
                      <td><strong>Coupon Amount</strong></td>
                      <td>${{ $orderDetails['coupon_amount'] }}</td>
                    </tr>
                    <tr>
                      <td><strong>Payment Method</strong></td>
                      <td>{{ $orderDetails['payment_method'] }}</td>
                    </tr>
                    <tr>
                      <td><strong>Payment Gateway</strong></td>
                      <td>{{ $orderDetails['payment_gateway'] }}</td>
                    </tr>
                    
                  </tbody>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><strong>Delivery Address</strong></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td><strong>Name</strong></td>
                      <td>{{ $orderDetails['fname'] }} {{ $orderDetails['lname'] }}</td>
                    </tr>

                    <tr>
                      <td><strong>Address</strong></td>
                      <td>{{ $orderDetails['address'] }}</td>
                    </tr>

                    <tr>
                      <td><strong>City</strong></td>
                      <td>{{ $orderDetails['city'] }}</td>
                    </tr>

                    <tr>
                      <td><strong>State</strong></td>
                      <td>{{ $orderDetails['district'] }}</td>
                    </tr>

                    <tr>
                      <td><strong>Country</strong></td>
                      <td>{{ $orderDetails['country'] }}</td>
                    </tr>

                    <tr>
                      <td><strong>Zipcode</strong></td>
                      <td>{{ $orderDetails['zipcode'] }}</td>
                    </tr>

                    <tr>
                      <td><strong>Mobile</strong></td>
                      <td>{{ $orderDetails['mobile'] }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><strong>Customer Details</strong></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td><strong>Name</strong></td>
                      <td>{{ $userDetails['fname'] }} {{ $userDetails['lname'] }}</td>
                    </tr>
                    <tr>
                      <td><strong>Email</strong></td>
                      <td>{{ $userDetails['email'] }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><strong>Billing Address</strong></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td><strong>Name</strong></td>
                      <td>{{ $userDetails['fname'] }} {{ $userDetails['lname'] }}</td>
                    </tr>

                    <tr>
                      <td><strong>Address</strong></td>
                      <td>{{ $userDetails['address'] }}</td>
                    </tr>

                    <tr>
                      <td><strong>City</strong></td>
                      <td>{{ $userDetails['city'] }}</td>
                    </tr>

                    <tr>
                      <td><strong>State</strong></td>
                      <td>{{ $userDetails['district'] }}</td>
                    </tr>

                    <tr>
                      <td><strong>Country</strong></td>
                      <td>{{ $userDetails['country'] }}</td>
                    </tr>

                    <tr>
                      <td><strong>Zipcode</strong></td>
                      <td>{{ $userDetails['pincode'] }}</td>
                    </tr>

                    <tr>
                      <td><strong>Mobile</strong></td>
                      <td>{{ $userDetails['mobile'] }}</td>
                    </tr>   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><strong>Update Order Status</strong></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>
                    <form action="{{ url('admin/update-order-status') }}" method="post">
                    @csrf
                    <tr>
                      <td colspan="2">
                        <input type="hidden" name="order_id" value="{{ $orderDetails['id'] }}">
                        <select name="order_status" id="order_status" style="width:70%;display:inline-block" class="form-control" required>
                          <option value="">Select Status</option>
                          @foreach($orderStatuses as $status)
                          <option value="{{ $status['name'] }}" @if($orderDetails['order_status']==$status['name']) selected="" @endif>{{ $status['name'] }}</option>
                          @endforeach
                        </select>
                        <button class="btn btn-success ml-3 mb-1" type="submit" >Submit</button>
                      </td>
                    </tr>
                    
                    <tr id="courier_tracking_show" @if(empty($orderDetails['order_status'])) style="display: none;" @endif>
                      <td><input type="text" class="form-control" name="courier_name" value="{{ @$orderDetails['courier_name'] }}" id="courier_name" placeholder="Courier Name"></td>
                      <td><input type="text" class="form-control" name="tracking_number" value="{{ @$orderDetails['tracking_number'] }}" id="tracking_number" placeholder="Tracking Number"></td>
                    </tr>
                    
                    </form>
                    @foreach($orderLogs as $log)
                    <tr>
                      <td><strong>{{ $log['order_status'] }}</strong></td>
                      <td>{{ date('j F, Y, g:i a', strtotime($log['created_at'])) }}</td>
                    </tr>
                    @endforeach   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><strong>Ordered Products</strong></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Product Image</th>
                      <th>Product Code</th>
                      <th>Product Name</th>
                      <th>Product Size</th>
                      <th>Product Color</th>
                      <th>Product Qty</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($orderDetails['orders_products'] as $product)
                  <tr>
                    <td>
                      <?php $getProductImage = App\Product::getProductImage($product['product_id']) ?>
                      <a target="_blank" href="{{ url('product/'.$product['product_id']) }}"><img style="width: 100px;" src="{{ asset('images/product_images/small/'.$getProductImage['main_image']) }}" alt=""></a>
                    </td>
                    <td>{{ $product['product_code'] }}</td>
                    <td>{{ $product['product_name'] }}</td>
                    <td>{{ $product['product_size'] }}</td>
                    <td>{{ $product['product_color'] }}</td>
                    <td>{{ $product['product_qty'] }}</td>
                  </tr>
                  @endforeach
                  
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection