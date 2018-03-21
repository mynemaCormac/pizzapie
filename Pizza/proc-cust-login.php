<?php

	include 'connect.php';

	$email		= $_POST['email'];
	$password	= $_POST['password'];

	$result = $conn->query("select * from customers where email='$email' and password='$password'");
	$rows = $result->fetch_assoc();

	if ($rows['email']==$email and $rows['password']==$password){
		session_start();
		$_SESSION['cid']=$rows['CID'];
		header("location: home.php");
	}else{
		echo "No No No";
	}

?>