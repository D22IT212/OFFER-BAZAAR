<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | E-Shopper</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/price-range.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>	
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<!-- Start header -->
	<?php include("harea.php")?>
	<!-- End header -->

<?php
$servername="localhost";
$username="root";
$password="";
$dbname="offerbazar";
//CREATE CONNECTION
$conn=new mysqli($servername,$username,$password,$dbname);
//CHECK CONNECTION
if ($conn->connect_error) 
{
	die("CONNECTION FAILED:".$conn->connect_error);
}
$sql="select * from cart_table left join product_table on cart_table.product_id=product_table.product_id where cart_table.cust_id=".$_SESSION["id"]."";
$result=$conn->query($sql);
?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td>ID</td>
								<td>Product Name</td>
								<td>Photo</td>	
									<td>Price</td>	
									<td>Quantity</td>
										<td>Subtotal</td>
							<td>DELETE</td>
						</tr>
					</thead>
					<tbody>

<?php  
$total=0;
while($row=$row=$result->fetch_assoc())
{
	
	$total=$total+$row["subtotal"];
?>

						<tr>
							<td class="">
								<?php echo $row["cart_id"] ?>
							</td>
							
								<td class="">
								<?php echo $row["name"] ?>
							</td>
							<td class="">
								<div class="view-product">
								<img src="../images/home/<?php echo $row["image"] ?>" alt="kp" style="height:100px;width:100px"/>
							</div>
							</td>
								<td class="">
								<?php echo $row["pprice"] ?>
							</td>
								<td class="">
								<?php echo $row["quantity"] ?>
							</td>
								<td class="">
								<?php echo $row["subtotal"] ?>
							</td>
							<td class="cart_price">
								<a href="deletedata.php?id=<?php echo $row["cart_id"]; ?>">Delete</a> 
							</td>
						</tr>

						
<?php
}
$conn->close();
?>
</tbody>
				</table>

				<div class="cart_total_price">
				Total Bill : Rs <?php echo $total; ?><br/>
				<a href="checkout.php?total=<?php echo $total; ?>">Checkout</a>
				</div>
			</div>
		</div>
	</section>


	<!-- Start footer -->
	<?php include("footerarea.php")?>
	<!-- End footer -->
	
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>