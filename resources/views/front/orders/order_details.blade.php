<div class="card border-0 single_order">
    <h4 class="font-w-6"><strong>Order #{{ $orderDetails['id'] }}</strong> &nbsp; </h4>
    <button class="btn btn-success float-right orderList"><strong>Order List</strong></button>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <h5><strong>Order Details</strong></h5>
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td>Order Date</td>
                  <td>{{ date('F d, Y', strtotime($orderDetails['created_at'])) }}</td>
                </tr>
                <tr>
                  <td>Order Status</td>
                  <td>{{ $orderDetails['order_status'] }}</td>
                </tr>
                @if(!empty($orderDetails['courier_name']))
                <tr>
                  <td>Courier Name</td>
                  <td>{{ $orderDetails['courier_name'] }}</td>
                </tr>
                @endif
                @if(!empty($orderDetails['tracking_number']))
                <tr>
                  <td>Tracking Number</td>
                  <td>{{ $orderDetails['tracking_number'] }}</td>
                </tr>
                @endif
                <tr>
                  <td>Order Total</td>
                  <td>${{ $orderDetails['grand_total'] }}</td>
                </tr>
                <tr>
                  <td>Shipping Charges</td>
                  <td>${{ $orderDetails['shipping_charge'] }}</td>
                </tr>
                <tr>
                  <td>Coupon Code</td>
                  <td>@if(!empty($orderDetails['coupon_code'])) {{ $orderDetails['coupon_code'] }} @endif</td>
                </tr>
                <tr>
                  <td>Coupon Amount</td>
                  <td>${{ $orderDetails['coupon_amount'] }}</td>
                </tr>
                <tr>
                  <td>Payment Method</td>
                  <td>{{ $orderDetails['payment_method'] }}</td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-6">
          <h5><strong>Delivery Address</strong></h5>
          <div class="table-responsive">

            <table class="table">
              <tbody>

                <tr>
                  <td>Name</td>
                  <td>{{ $orderDetails['fname'] }} {{ $orderDetails['lname'] }}</td>
                </tr>

                <tr>
                  <td>Address</td>
                  <td>{{ $orderDetails['address'] }}</td>
                </tr>

                <tr>
                  <td>City</td>
                  <td>{{ $orderDetails['city'] }}</td>
                </tr>

                <tr>
                  <td>State</td>
                  <td>{{ $orderDetails['district'] }}</td>
                </tr>

                <tr>
                  <td>Country</td>
                  <td>{{ $orderDetails['country'] }}</td>
                </tr>

                <tr>
                  <td>Zipcode</td>
                  <td>{{ $orderDetails['zipcode'] }}</td>
                </tr>

                <tr>
                  <td>Mobile</td>
                  <td>{{ $orderDetails['mobile'] }}</td>
                </tr>

                
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <h5><strong>Products</strong></h5>
        <table class="table">
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
    </div>
  </div>