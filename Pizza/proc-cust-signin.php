<?php

	include 'connect.php';

	$fname		= $_POST['fname'];
	$mname		= $_POST['mname'];
	$lname		= $_POST['lname'];
	$number		= $_POST['number'];
	$address	= $_POST['address'];
	$email		= $_POST['email'];
	$password	= $_POST['pass'];

	$result = $conn->query("select * from customers where email='$email'");
	$checkExist = $result->fetch_assoc();
	if ($checkExist['email']==$email) {
		echo "Email already used";
	}else{
		$execute = $conn->query("insert into customers(fname,mname,lname,number,address,email,`password`) values('$fname','$mname','$lname','$number','$address','$email','$password')");
		//header("location: ");
		echo "Make the \"Congratulations! You're one of us now!\" confirmation page";
	}
?>