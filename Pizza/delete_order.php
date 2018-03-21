<?php
	include 'connect.php';

	$ccid = $_GET['ccid'];

	$execute = $conn->query("delete from cartcontents where CCID=$ccid");
	header("location: show_cart.php");
?>