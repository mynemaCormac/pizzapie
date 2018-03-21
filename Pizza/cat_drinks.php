<!DOCTYPE html>
<html>
<head>
	<title>Drinks | MyPie Pizzeria</title>
	<link rel="stylesheet" type="text/css" href="./css/cat-style.css?<?php echo time();?>">
	<link rel="stylesheet" type="text/css" href="./css/all-style.css?<?php echo time();?>">

</head>
<body>
	<?php include 'header.php'; ?>
	<br>
	
	<div class="menu-list">
		<a href="cat_pizza.php">PIZZA</a>
		<a href="cat_pasta.php">PASTA</a>
		<a href="cat_drinks.php" style="border: 2px solid red; border-radius: 5px; padding: 4px;">DRINKS</a>
	</div>	
	<section>
		<h1>Drinks & Beverages</h1>
		<hr>
		<?php
			$result = $conn->query("select * from products where category='drinks'");
			while ($row = $result->fetch_assoc()){
				echo "<div class='box'>";
				echo "<a href='by_product.php?pid=".$row['PID']."''>";
				echo "<img src='./products/".$row['PID'].".jpg' /><br><br>";
				echo "<span>".$row['prodName']."</span>";
				echo "<br><br>";
				echo "<div>₱ ".$row['price']."</div>";
				echo "</a></div>";
			}

		?>

	</section>
	<aside></aside>
	<?php include 'footer.php'; ?>
</body>
</html>