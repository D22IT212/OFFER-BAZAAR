<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home</title>
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
    <link rel="shortcut icon" href="../images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<!-- Start header -->
	<?php include("harea.php")?>
	<!-- End header -->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
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
$sql="select * from category_table";
$result=$conn->query($sql);
while($row=$row=$result->fetch_assoc())
{
	?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title"><a href="#"><?php echo $row["category_name"] ?></a></h4>
		</div>
	</div>
<?php
}

$conn->close();
?>
									
						</div><!--/category-products-->
					
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Top Products</h2>
						
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
$sql="select * from product_table";
$result=$conn->query($sql);
while($row=$row=$result->fetch_assoc())
{
?>
							<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="../images/home/<?php echo $row["image"] ?>" alt="kp" />
											<h2><i class="fa fa-inr"></i><?php echo $row["price"] ?></h2>
											<p><?php echo $row["name"] ?></h2></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
								</div>
							</div>
						</div>



<?php
}

$conn->close();
?>				
						
						
					</div><!--features_items-->
					</div><!--/category-tab-->
					
					
					
				</div>
			</div>
		</div>
	</section>
	
	<!-- Start Footer -->
	<?php include("footerareaphp")?>
	<!-- End Footer -->
	
    <script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.scrollUp.min.js"></script>
	<script src="../js/price-range.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>