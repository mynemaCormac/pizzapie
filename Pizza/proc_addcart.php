<?php

	include 'connect.php';

	$qty = $_POST['qty'];
	$id = $_GET['id'];

//PRODUCT DETAILS EXTRACTION
	$result = $conn->query("select * from products where PID=$id");
	$prodInfo = $result->fetch_assoc();

	$price = $prodInfo['price'];
//calculate total cost...
	$total = $qty * $price;

//START session for generating ORDER ID
	session_start();

	if (isset($_SESSION['trans'])){
		#code...
	}else{

		$make_oid = 001;
		
		while (!isset($_SESSION['trans'])) {

			$o_res = $conn->query("select OID from cartcontents where OID=$make_oid");
			$o_row = $o_res->fetch_assoc();

			if ($o_row['OID'] != $make_oid){	
				$_SESSION['trans'] = $make_oid;	
			}else{
				$make_oid++;	
			}				
		}
	}

	$OID = $_SESSION['trans'];

//End of the OID Generation code
	
//----After this line.. the variables $qty and $id will finally be used. At last, ain't it?----//

	//First, check if the product is already in the cart
	$checkCart_q = $conn->query("select * from cartcontents where PID=$id and OID=$OID");
	$checkCart_r = $checkCart_q->fetch_assoc();
	
	if ($checkCart_r['PID'] == $id){	//If the product exists in the cart

		//Getting the current data from the database, specifically QTY and TOTAL
		$preQty = $checkCart_r['qty'];
		$preTotal = $checkCart_r['subtotal'];

		$newQty = $preQty + $qty;
		$newTotal = $preTotal + $total;

//Increasing the current QTY and TOTAL according to the new data added//
		$execute = $conn->query("update cartcontents set qty=$newQty, subtotal=$newTotal where PID=$id and OID=$OID");
		header("location: by_product.php?pid=$id");
	}else{
//New Product in the cart
		$execute = $conn->query("insert into cartcontents(OID,PID,qty,subtotal,holdStatus) values($OID,$id,$qty,$total,'Pending')");
		header("location: by_product.php?pid=$id");
	}

?>
