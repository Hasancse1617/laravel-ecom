<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<table>
		<tr>
			<td>Dear {{$name}}</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Please click on below link to activate your account:-</td>
		</tr>
		<tr>
			<td><a href="{{url('confirm/'.$code)}}">Confirm Account</a></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Thanks & Regards,</td>
		</tr>
		<tr>
			<td>E-commerce Website</td>
		</tr>
	</table>
</body>
</html>