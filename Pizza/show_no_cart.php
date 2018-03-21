<!DOCTYPE html>
<html>
<head>
	<title>Cart | Bead Merch</title>
	<link rel="stylesheet" type="text/css" href="./css/all-style.css?<?php echo time();?>">
	<link rel="stylesheet" type="text/css" href="./css/main-style.css?<?php echo time();?>">

</head>
<body>
	<?php include 'header.php';?>
	<br><br>
	<section>
		<h2>There are no items on your cart yet.</h2>

		<?php
			/**
			Yow! Add something like an advertistment or suggestion for the customers.
			
			"Hey there, seems like you haven't added anything yet. Why don't you look 
			at these boxes and maybe you would like something from here!"

			Then there's a list of products in display. Which could be in sets:
				-Counted random items
					>Pizza Only
					>Pasta Only
					>Pizza & Pasta
				-A Pizza,  Pasta, and a Drink
				-Offer(s)

			**/
		?>

	</section>

	<?php include 'footer.php';?>
</body>
</html>