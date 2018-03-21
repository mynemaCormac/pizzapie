<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<link rel="stylesheet" type="text/css" href="./css/all-style.css?<?php echo time();?>">
	<link rel="stylesheet" type="text/css" href="./css/signin-style.css?<?php echo time();?>">
</head>
<body>
	<?php include 'header.php'; ?>

	<br>
	<section style="width: 50%;">
		<div class="buff-h1">CREATE ACCOUNT</div>
		<br><br><br>
		<form method="post" action="proc-cust-signin.php">
			<input type="text" name="fname" placeholder="First Name" required autofocus  />
			<input type="text" name="mname" placeholder="Middle Name" required />
			<input type="text" name="lname" placeholder="Last Name" required />
			<input type="text" name="number" placeholder="Mobile Number" minlength="11" maxlength="11" required />
			<input type="text" name="address" placeholder="Home Address" required />
			<input type="text" name="email" placeholder="Email Address" required />
			<input type="password" name="pass" placeholder="Password" required />
			<input type="submit" name="submit" value="CREATE" class="btn" />
			<br>
			<a style="color: grey; text-decoration: underline; font-size: 80%;" href="cat_pizza.php">Return to menu</a>
		</form>

	</section>

	<?php include 'footer.php'; ?>
</body>
</html>