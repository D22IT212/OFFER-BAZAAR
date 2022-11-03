<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ORDER DETAIL</title>
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
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
    <style>
		table
		{
			border-collapse: collapse;
			width:75%;
			color:  #4db8ff;
			font-family: monospace;
			font-size: 30px;
			text-align: left;
		}
		th
		{
			background-color: #588c7e;
			color: white;
		}
		tr:nth-child(even)
		{
			background-color: #f2f2f2;
		}
	</style>
</head><!--/head-->

<body>
	<!-- Start header -->
	<?php include("harea.php")?>
	<!-- End header -->
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>ORDER DETAIL</h2>
						<div>
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "offerbazar";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) 
		{
  			die("Connection failed: " . $conn->connect_error);
		}
		$sql="select * from order_detail_table left join product_table on .order_detail_table.product_id=product_table.product_id where order_detail_table.order_id=".$_GET["id"];
		
		$result=$conn->query($sql);	
	?>
	<table border="1" class="main">
		<tr>
			
			<th>ORDER_ID</th>
			<th>Name</th>
			<th>price</th>
			<th>quantity</th>
			<th>SUBTOTAL</th>
		</tr>
	<?php
		while($row=$result->fetch_assoc())
		{
	?> 
	<tr style="color:black">
		
		<td><?php echo $row["order_id"]; ?></td>
			<td><?php echo $row["name"]; ?></td>
		<td><?php echo $row["price"]; ?></td>
			<td><?php echo $row["quantity"]; ?></td>
		<td><?php echo $row["subtotal"]; ?></td>
	
	</tr>
	<?php	
		}	
	?>
	</table>
	<?php
		$conn->close();
	?>
						</div>
					</div><!--/login form-->
				</div>
				
				
			</div>
		</div>
	</section><!--/form-->
	
	<!-- Start Footer -->
	<?php include("footerarea.php")?>
	<!-- End Footer -->
	  
    <script src="../js/jquery.js"></script>
	<script src="../js/price-range.js"></script>
    <script src="../js/jquery.scrollUp.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>