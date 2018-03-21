<?php
	
	session_start();
	unset($_SESSION['cid']);
	header("location: home.php");
?>