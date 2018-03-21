<!DOCTYPE html>
<html>
<head>
	<title>Pastas | MyPie Pizzeria</title>
	<link rel="stylesheet" type="text/css" href="./css/cat-style.css?<?php echo time();?>">
	<link rel="stylesheet" type="text/css" href="./css/all-style.css?<?php echo time();?>">
	
</head>
<body>
	<?php include 'header.php'; ?>
	<br>
	
	<div class="menu-list">
		<a href="cat_pizza.php" >PIZZA</a>
		<a href="cat_pasta.php" style="border: 2px solid red; border-radius: 5px; padding: 4px;">PASTA</a>
		<a href="cat_drinks.php">DRINKS</a>
	</div>	
	<section>
		<h1>SPECIALTY PASTAS</h1>
		<hr>
		<?php
			$result = $conn->query("select * from products where category='pasta'");
			while ($row = $result->fetch_assoc()){
				echo "<div class='box'>";
				echo "<a href='by_product.php?pid=".$row['PID']."''>";
				echo "<img src='./products/".$row['PID'].".jpg' /><br><br>";
				echo "<span>".$row['prodName']."</span>";
				echo "<p>	".$row['prodDesc']."</p>";
				echo "<div>₱ ".$row['price']."</div>";
				echo "</a></div>";
			}

		?>

	</section>
	<aside></aside>
	<?php include 'footer.php'; ?>
</html>