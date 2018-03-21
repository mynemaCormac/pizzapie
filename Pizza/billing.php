<!DOCTYPE html>
<html>
<head>
	<title>Billing | MyPie Pizzeria</title>
	<link rel="stylesheet" type="text/css" href="./css/all-style.css?<?php echo time();?>">
	<link rel="stylesheet" type="text/css" href="./css/bill-style.css?<?php echo time();?>">	

<?php
	include 'connect.php';

	$date = date("m/d/y");
/*
	session_start();

	$cid = $_SESSION['cid'];	//Customer
	
	$customer = $conn->query("select * from customers where CID=$cid");
	$rowC = $customer->fetch_assoc();*/

	$branch = $conn->query("select * from branches order by location");
?>
</head>
<body>
	<header>
			<img src="./file_img/logo.png" />
	</header>
	<br>
	<section>
		<h1>Billing Information</h1>
		<hr><br>
		<form method="post">
			<table>
				<tr>
					<td>First Name</td>
					<td>Middle Name</td>
				</tr>
				<tr>
					<td> <input type="text" name="fname" placeholder="Juan" required /><br><br> </td>
					<td> <input type="text" name="mname" placeholder="Mariano" required /><br><br> </td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td>Contact No.</td>
				</tr>
				<tr>
					<td> <input type="text" name="lname" placeholder="dela Cruz" required /><br><br> </td>
					<td> <input type="text" name="number" placeholder="09XX XXX XXXX" minlength="11" maxlength="11" required /><br><br> </td>
				</tr>
				<tr>
					<td>Complete Address</td>
					<td>Email</td>
				</tr>
				<tr>
					<td> <input type="text" name="address" placeholder="Brgy. Narra, San Fernando city, La Union" required /> </td>
					<td> <input type="text" name="email" placeholder="juan@delacruz.com" required /> </td>
				</tr>
				<tr><td colspan="2"><hr><br></td></tr>
				<tr>
					<td>Receiving Branch:</td>
					<td>
						<select name="branch" required>
							<option value="">Branch Location</option>
							<?php
								while ($rows = $branch->fetch_assoc()) {
									echo "<option value=".$rows['location'].">".$rows['location']."</option>";
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Paymend Option: </td>
					<td>
						<select name="payment" required >
							<option value="">Select Option</option>
							<option value="Paypal">Paypal</option>
							<option value="Visa">Visa</option>
							<option value="Master Card">Master Card</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Card Number: </td>
					<td> <input type="text" name="card" placeholder="1234 2345 4567 6789" minlength="16" maxlength="16"> </td>
				</tr>
				<tr>
					<td><a href="show_cart.php">RETURN TO CART</a></td>
					<td align="right"><br><br><input type="submit" name="submit" value="Proceed to Review Order &rarr;" /></td>
				</tr>
			</table>
			
		</form>
	</section>

	<?php include 'footer.php'; ?>
</body>
</html>