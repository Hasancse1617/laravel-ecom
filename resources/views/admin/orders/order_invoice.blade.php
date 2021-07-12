<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    .invoice-title h2, .invoice-title h3 {
        display: inline-block;
    }

    .table > tbody > tr > .no-line {
        border-top: none;
    }

    .table > thead > tr > .no-line {
        border-bottom: none;
    }

    .table > tbody > tr > .thick-line {
        border-top: 2px solid;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2>
                <h3 class="pull-right">Order # {{ $orderDetails['id'] }}</h3>
                <br>
                <span class="pull-right">
                    <?php echo DNS1D::getBarcodeHTML($orderDetails['id'], 'C39'); ?>
                </span><br>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
    					{{ $userDetails['fname'] }} {{ $userDetails['lname'] }}<br>
    					{{ $userDetails['address'] }}<br>
    					{{ $userDetails['city'] }}<br>
                        {{ $userDetails['district'] }}<br>
                        {{ $userDetails['country'] }}<br>
                        {{ $userDetails['pincode'] }}<br>
                        {{ $userDetails['mobile'] }}<br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
    					{{ $orderDetails['fname'] }} {{ $orderDetails['lname'] }}<br>
                        {{ $orderDetails['address'] }}<br>
                        {{ $orderDetails['city'] }}<br>
                        {{ $orderDetails['district'] }}<br>
                        {{ $orderDetails['country'] }}<br>
                        {{ $orderDetails['zipcode'] }}<br>
                        {{ $orderDetails['mobile'] }}<br>
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					{{ $orderDetails['payment_method'] }}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					{{ date('j F, Y',strtotime($orderDetails['created_at'])) }}<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<?php $subtotal = 0; ?>
                                @foreach($orderDetails['orders_products'] as $order)
                                <tr>
    								<td>
                                        Name: {{ $order['product_name'] }}<br>
                                        Code: {{ $order['product_code'] }}<br>
                                        Size: {{ $order['product_size'] }}<br>
                                        Color: {{ $order['product_color'] }}<br>
                                        <?php echo DNS1D::getBarcodeHTML($order['product_code'], 'C39'); ?>
                                    </td>
    								<td class="text-center">${{ $order['product_price'] }}</td>
    								<td class="text-center">{{ $order['product_qty'] }}</td>
    								<td class="text-right">${{ $order['product_price']*$order['product_qty'] }}</td>
    							</tr>
                                <?php $subtotal = $subtotal+($order['product_price']*$order['product_qty']); ?>
                                @endforeach
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">${{ $subtotal }}</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Shipping</strong></td>
    								<td class="no-line text-right">$0</td>
    							</tr>
                                @if($orderDetails['coupon_amount']>0)
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Discount</strong></td>
                                    <td class="no-line text-right">${{ $orderDetails['coupon_amount'] }}</td>
                                </tr>
                                @endif
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Grand Total</strong></td>
    								<td class="no-line text-right">${{ $orderDetails['grand_total'] }}</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>