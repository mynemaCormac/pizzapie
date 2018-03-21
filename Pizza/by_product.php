<!DOCTYPE html>
<html>
<head>

<?php
	include 'connect.php';

	//Getting selected product
	$PID = $_GET['pid'];
	$res_id = $conn->query("select * from products where PID=$PID");
	$row_id = $res_id->fetch_assoc();
	$prodName = $row_id['prodName'];
	$category = $row_id['category'];
?>

	<title><?= $prodName; ?> | <?= $category;?>s</title>
	<link rel="stylesheet" type="text/css" href="./css/all-style.css?<?php echo time()?>">
	<link rel="stylesheet" type="text/css" href="./css/prod-style.css?<?php echo time()?>">
<?php
	//CONTENT EXTRACTION

	$result = $conn->query("select * from products where PID=$PID");
	$rows = $result->fetch_assoc();

	//Product details
	$name	=	$row_id['prodName'];
	$desc	=	$row_id['prodDesc'];
	$price	=	$row_id['price'];
?>

</head>
<body>
	<?php include 'header.php'; ?>

	<section>
		<br>
		<form method="POST" action="proc_addcart.php?id=<?=$PID?>">
			<img src="./products/<?= $PID?>.jpg" class="product-pic">
			<h2><?=$name?></h2>
			<hr>
			<p> <?=$desc?></p>
			Price: <b>₱ <?=$price?></b><br><br>
			Qty <input type="number" name="qty" placeholder="0" max="10" min="0" style="font-size: 150%;">
			<button>Add to Cart</button>

			<?php
				/**
					Add a "You may also like" content.. like 3
				**/
			?>
	</section>

	<?php include 'footer.php'; ?>

</body>
</html>