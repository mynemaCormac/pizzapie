<!DOCTYPE html>
<html>
<head>
	<title>Orders | Branch | MyPie</title>
	<link rel="stylesheet" type="text/css" href="../css/all-style.css?<?php echo time();?>">
	<link rel="stylesheet" type="text/css" href="../css/branch-o-style.css?<?php echo time();?>">
	<link rel="stylesheet" type="text/css" href="../css/borrowed/responsive-table.css?<?php echo time();?>">
</head>

<?php
	include '../connect.php';

	//Extracting order data
	$result = $conn->query("select o.oid, c.fname,c.lname,c.address,o.status,o.date from orders o inner join customers c on o.cid=c.cid");
	$rows = $result->fetch_assoc();


?>
<body>
	<header>
		<a href="home.php">
			<img src="../file_img/logo.png">
		</a>
		<div class="top-nav">
			<a href="#">Log Out</a>
		</div>
	</header>

	<section>
		<br>
		<h1>Orders</h1><hr>
		<br>
		<div class="table">
			<div class="row header">
				<div class="cell">Date/Time</div>
				<div class="cell">Order No.</div>
				<div class="cell">Customer</div>
				<div class="cell">Address</div>
				<div class="cell">Status</div>
				<div class="cell">Price</div>
				<div class="cell">Actions</div>
			</div>
			<?php
				$result = $conn->query("select o.oid, c.fname as fn,c.lname as ln,c.address,o.status,o.date from orders o inner join customers c on o.cid=c.cid");
				while ($rows = $result->fetch_assoc()) {
					$oid = $rows['oid'];

					//Getting total price
					$getTotal_q = $conn->query("select total from payment where oid=$oid");
					$getTotal_r = $getTotal_q->fetch_assoc();
					$total = $getTotal_r['total'];

					$name = $rows['fn']." ".$rows['ln']; 
			?>
			<div class="row">
				<div class="cell"><?= $rows['date'] ?></div>
				<div class="cell"><?= $rows['oid'] ?></div>
				<div class="cell"><?= $name ?></div>
				<div class="cell"><?= $rows['address'] ?></div>
				<div class="cell"><b><?= $rows['status'] ?></b></div>
				<div class="cell">₱ <?= $total ?></div>
				<div class="cell"><input type="button" value="Actions" style="padding: 10px;margin: 0 auto;"></div>
			</div>
			<?php
				}
			?>
		</div>
	</section>

	<?php include 'footer.php'; ?>
</body>
</html>