<?php
	$conn = new mysqli("localhost","root","","pizzapie");
		if ($conn->connect_error){
			die("...");
		}
?>