<!DOCTYPE html>
<html>
<head>
	<title>Cart | MyPie Pizzeria</title>
	<link rel="stylesheet" type="text/css" href="./css/all-style.css">
	<link rel="stylesheet" type="text/css" href="./css/main-style.css">
	<link rel="stylesheet" type="text/css" href="./css/classic-toast.css">
	<link rel="stylesheet" type="text/css" href="./css/bill-style.css?<?php echo time();?>">	
</head>

<body>
	<?php include 'header.php'; ?>

	<section style="width: 80%">
		<br>
		<h2>Items added to your cart</h2>
		<br>
		<table width="100%">
			<tr align="left">
				<th colspan="2">Product</th>
				<th>Price</th>
				<th>Qty</th>
				<th>Subtotal</th>
				<th> </th>
			</tr>
			<tr><td colspan="5"><hr></td></tr>
			<?php
				//...Cart Check
				$result = $conn->query("select count(ccid) as count from cartcontents where oid=$OID");
				$rows = $result->fetch_assoc();
				if ($rows['count']==0){
					header("location: show_no_cart.php");
				}
				//...End of Cart Check

				$query = "select c.ccid AS ccid,p.pid AS pid,p.prodName AS `name`,p.category AS category,
						 p.price AS price,c.qty as qty,c.total AS subtotal
						 FROM cartcontents c INNER JOIN products p ON c.pid=p.pid
						 WHERE c.oid=".$OID;
				$result = $conn->query($query);
				$total = 0;

				while (	$rows = $result->fetch_assoc()){
					echo "<tr>";
					echo "<td width='16%'><a href='by_product.php?pid=".$rows['pid']."'>";
						echo "<img src='./products/".$rows['pid'].".jpg' width='80%'></a></td>";
					echo "<td>".$rows['name']."</td>";
					echo "<td>₱ ".$rows['price']."</td>";
					echo "<td>".$rows['qty']."</td>";
					echo "<td>₱ ".$rows['subtotal']."</td>";
					echo "<td><a style='color: red;cursor:pointer;' onclick=\" return dueProcess(".$rows['ccid']."); \">";
					echo "<img src='./icons/delete.png'>";
					echo "</a></td>";
					echo "</tr>";
					echo "<div id='snackbar'>Removing ".$rows['name']." from your cart...</div>";

					$total = $total + $rows['subtotal'];
				}

			?>
			<tr><td colspan="5"><hr></td></tr>
			<tr>
				<td colspan="3"></td>
				<th align="left">Grand Total</th>
				<th align="left">₱ <?=$total?></th>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td colspan="3" align="right"><br><br>
					<a href="billing.php"><input type="submit" name="submit" value="Proceed to Review Order &rarr;" /></a>
				</td>
			</tr>
		</table>
	</section>

	<?php include 'footer.php'; ?>

</body>

<script>
	//This code is such a mess...
	var ccid = 0;
	function  dueProcess(id){
		ccid = id;
		var x = confirm('Are you sure?');
			if(x==true){
			summonBubble();
			setTimeout(goBack, 1500);
			//return true;
		}else{
			return false;
		}
	}
	function goBack() {
		window.location.href = "delete_order.php?ccid="+ccid;
	}

	function summonBubble() {
	    var x = document.getElementById("snackbar")
	    x.className = "show";
	    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
	}
</script>

</html>