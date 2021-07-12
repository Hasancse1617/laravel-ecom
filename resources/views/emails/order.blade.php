
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<table style="width:700px;">
		<tr><td>&nbsp;</td></tr>
		<tr><td><img src="{{ url('images/front_images/logo.png') }}" alt=""></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Hello {{ $name }}</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Thank you for shopping with us. Your order details are as below :-</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Order no: {{ $order_id }}</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
		   <td>
                <table style="width: 95%;" cellpadding="5" cellspacing="5" bgcolor="#f7f4f4">
                	<tr bgcolor="#cccccc">
                		<td>Product Name</td>
                		<td>Code</td>
                		<td>Size</td>
                		<td>Color</td>
                		<td>Quantity</td>
                		<td>Price</td>
                	</tr>
                	@foreach($orderDetails['orders_products'] as $order)
                	 <tr>
                	 	<td>{{ $order['product_name'] }}</td>
                	 	<td>{{ $order['product_code'] }}</td>
                	 	<td>{{ $order['product_size'] }}</td>
                	 	<td>{{ $order['product_color'] }}</td>
                	 	<td>{{ $order['product_qty'] }}</td>
                	 	<td>${{ $order['product_price'] }}</td>
                	 </tr>
                	@endforeach
                	<tr>
                		<td colspan="5" align="right">Shipping Charges</td>
                		<td>${{ $orderDetails['shipping_charge'] }}</td>
                	</tr>
                	<tr>
                		<td colspan="5" align="right">Coupon Discount</td>
                		<td>${{ $orderDetails['coupon_amount'] }}</td>
                	</tr>
                	<tr>
                		<td colspan="5" align="right">Grand Total</td>
                		<td>${{ $orderDetails['grand_total'] }}</td>
                	</tr>
                	<tr><td>&nbsp;</td></tr>
                    <tr>
                    	<td>
                    		<table>
                    			<tr>
                    				<td><strong>Delivery Address</strong></td>
                    			</tr>
                    			<tr>
                    				<td>{{ $orderDetails['fname'] }} {{ $orderDetails['lname'] }}</td>
                    			</tr>
                    			<tr>
                    				<td>{{ $orderDetails['address'] }}</td>
                    			</tr>
                    			<tr>
                    				<td>{{ $orderDetails['city'] }}</td>
                    			</tr>
                    			<tr>
                    				<td>{{ $orderDetails['district'] }}</td>
                    			</tr>
                    			<tr>
                    				<td>{{ $orderDetails['country'] }}</td>
                    			</tr>
                    			<tr>
                    				<td>{{ $orderDetails['zipcode'] }}</td>
                    			</tr>
                    			<tr>
                    				<td>{{ $orderDetails['mobile'] }}</td>
                    			</tr>
                    		</table>
                    	</td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>For any enquiries, you can contact us at <a href="mailto:hasanali949494@gmail.com">hasanali949494@gmail.com</a></td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>Regards, <br>Team Hasan Limited</td></tr>
                    <tr><td>&nbsp;</td></tr>
                </table> 
		   </td>
	    </tr>
	</table>
</body>
</html>
