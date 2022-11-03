<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Details | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
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
	<div style="background-color:white">
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">	
					</div>
				</div><!--/price-range-->				
			</div>
		</div>
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
$sql="select * from product_table left join seller_table on product_table.seller_id=seller_table.seller_id  where product_table.product_id=".$_GET["product_id"]."";
$result=$conn->query($sql);
while($row=$row=$result->fetch_assoc())
{
?>
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="images/home/<?php echo $row["image"] ?>" alt="kp" />
							</div>
						
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								
								<h2><p><?php echo $row["name"] ?></h2></p>
								<p>Seller Name:<?php echo $row["sname"] ?></h2></p>
								
								<span>
								<span><i class="fa fa-inr"></i>MRP: <?php echo $row["Mrp_price"] ?><br/>

									
									<span><i class="fa fa-inr">Discount Price: </i><?php echo $row["price"] ?>
									</span>
									<label>Quantity:</label>
									<input type="number"/>
									
									<?php
									If(isset($_POST['submit']))
									{
										echo '<script>alert("Please Login and Order")</script>';
									}
									?>
									
									<form action="" method="post">
									<input type="submit" class="btn btn-fefault cart" style="width:200px;padding-bottom:35px;display: block;color:white" name="submit" value="Add to cart">
										
									</form>
								</span>
							</br>
								<img src="images/product-details/rating.png" alt="" />
								<div>
									<h2>Description: <?php echo $row["description"]." ".$row["weight"] ?></h2>
								</div>
								<p><b>Availability:</b> In Stock</p>
							
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
<?php
}

$conn->close();
?>					
				</div>
			</div>
		</div>
	</section>
	</div>
	<!-- Start footer -->
	<?php include("footerarea.php")?>
	<!-- End footer -->
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>