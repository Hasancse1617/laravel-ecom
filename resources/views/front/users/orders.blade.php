<?php 
    $orders = App\Order::with('orders_products')->where('user_id',Auth::user()->id)->orderBy('id','desc')->get()->toArray();
    // dd($orders);
 ?>
<div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
  <div class="card border-0 all-order">
    <h5 class="font-w-6">My Orders</h5>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Order</th>
              <th>Payment Method</th>
              <th>Date</th>
              <th>Status</th>
              <th>Total</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

            @foreach($orders as $order)
            <tr>
              <?php $qty = 0;$quantity=0; ?>
              @foreach($order['orders_products'] as $order_item)
                <?php
                   $qty = $order_item['product_qty'];
                   $quantity = $quantity + $qty;
                 ?> 
              @endforeach

              <td>#{{ $order['id'] }}</td>
              <td>{{ $order['payment_method'] }}</td>
              <td>{{ date('F d, Y', strtotime($order['created_at'])) }}</td>
              <td>{{ $order['order_status'] }}</td>
              <td>${{ $order['grand_total'] }} for {{$quantity}} @if($quantity > 1) items @else item @endif</td>
              <td><button order-id="{{ $order['id'] }}"  class="btn orderDetails btn-fill-out btn-sm">View</button></td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>