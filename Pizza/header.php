<?php
	include 'connect.php';

	$totalQty = 0;

	session_start();
	if (isset($_SESSION['trans'])){
		$OID = $_SESSION['trans'];

		$result = $conn->query("select * from cartcontents where OID=$OID");
		
		//Getting cart size (total quantity)
		while ($rows = $result->fetch_assoc()) {
			$totalQty = $rows['qty'] + $totalQty;
		}
	}

	if (isset($_SESSION['cid'])){
		$cid = $_SESSION['cid'];

		$result = $conn->query("select * from customers where CID=$cid");
		$rows = $result->fetch_assoc();

		$L1 = "profile.php"; //could be a php homepage auto
		$L2 = "href='proc-logout.php' onclick=\"javascript: return confirm('Are you sure you want to log out?');\"";
		$O1 = "Hi, ".$rows['fName'];
		$O2 = "Log Out";
	}else{
		$L1 = "cust-signup.php";
		$L2 = "href='cust-login.php'";
		$O1 = "Create account";
		$O2 = "Log In";
	}

?>

<header>
		<a href="home.php">
			<img src="./file_img/logo.png">
		</a>

		<div class="sub-nav">
			<a href="<?=$L1?>"> <?=$O1?> </a>
			<a <?=$L2?> > <?=$O2?> </a>
		</div>
		<nav>
			<a href="home.php">HOME</a>
			<a href="cat_pizza.php">MENU</a>
			<a href="">OFFERS</a>
			<?php  
				if ($totalQty == 0){
					echo "<a href='show_no_cart.php'>CART</a>";
				}else{
					echo "<a href='show_cart.php'>CART(".$totalQty.")</a>";
				}

			?>
		</nav>
</header>

