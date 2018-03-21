<!DOCTYPE html>
<html>
<head>
	<title>Log In | MyPie Pizzeria</title>
	<link rel="stylesheet" type="text/css" href="./css/all-style.css?<?php echo time();?>">
	<link rel="stylesheet" type="text/css" href="./css/signin-style.css?<?php echo time();?>">
</head>
<body>
	<?php include 'header.php'; ?>
	<br>
	<section>
		<h1>LOGIN</h1>
		<br><br>
		<div class="first-half">
			<form method="post" action="proc-cust-login.php">
				<input class="email" type="text" name="email" placeholder="Email Address" required autofocus />
				<input class="pass" type="password" name="password" placeholder="Password" required />
				<br><br>
				<input type="submit" name="submit" value="SIGN IN" class="btn" /><br><br>

				<a style="color: grey; text-decoration: underline; font-size: 80%;" href="#">Forgot your account?</a>	<br><br>
				<a style="color: grey; text-decoration: underline; font-size: 80%;" href="cust-signup.php">Create an account</a>

				
			</form>
		</div>

		<div class="div-1"></div>
		<p>OR</p>
		<div class="div-2"></div>

		<div class="second-half">
			<div class="benefits">
				<h1>ACCOUNT BENEFITS</h1>
				<br><br>
				<table width="100%">
					<tr>
						<td width="50%"><center><img src="./icons/account-benefit-1.png" /></td>
						<td width="50%"><center><img src="./icons/account-benefit-3.png" /></td>
					</tr>
					<tr style="text-align: center; font-size: 80%;font-weight: bold;">
						<td>Create a MyPie<br> customer account</td>
						<td>View customer order <br> status & history</td>
					</tr>
				</table>
				
			</div><a href="cust-signup.php">
					<button class="btn" style="width: 90%;">CREATE ACCOUNT</button>
				</a>
		</div>
	</section>

	<?php include 'footer.php'; ?>
</body>
</html>