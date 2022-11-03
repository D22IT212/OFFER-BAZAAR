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
    <title>Checkout | E-Shopper</title>
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

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->
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
		die("connection failed:".$conn->connect_error);
	}
	//$sql="INSERT INTO table name(ID, NAME) VALUES (1004,'VEDANT')";

	//isset();

	//Die();
	if (isset($_POST["placeorder"])) 
	{
	date_default_timezone_set('Asia/Kolkata'); 

		$currentdate=date("Y-m-d H:i:s");;
		$sql="INSERT INTO checkout(cust_id,total_amount,order_date,status,cust_name,mobile,address) VALUES (".$_SESSION["id"].",".$_POST["total"].",'".$currentdate."','pending','".$_POST["custname"]."','".$_POST["mobile"]."','".$_POST["address"]."')";

		//echo $sql;

		//die();

		$result=$conn->query($sql);
		if ($result===TRUE) 
		{
			$sql1="select * from checkout order by order_id desc";
			$result1=$conn->query($sql1);
			$row1=$result1->fetch_assoc();
			$order_id=$row1["order_id"];

			$sql2="select * from cart_table where cust_id=".$_SESSION["id"];

			$result2=$conn->query($sql2);
			
			//echo"NEW RECORD CREATED SUCCESSFULLY";
			while($row2=$result2->fetch_assoc())
			{

				$sql3="INSERT INTO order_detail_table VALUES ('',".$order_id.",".$row2["product_id"].",".$row2["pprice"].",".$row2["quantity"].",".$row2["subtotal"].")";

				//echo $sql3;
				//die();
				$result3=$conn->query($sql3);
				if($result3==TRUE)
				{
					$ok=1;
				}
				else
				{
					$ok=0;
				}
				//$row1=$result1->fetch_assoc();
			}

			if($ok==1)
			{
				$sql4="delete from cart_table where cust_id=".$_SESSION["id"];

				$result4=$conn->query($sql4);
				if($result4==TRUE)
				{

					echo '<script>alert("ORDERED SUCCESSFULLY")</script>';
			
				}
				else
				{

					//echo " ORDER UNSUCCESSFULL";
				}
			}
			else
			{
				//echo "UNSUCCESSFULLY";
			}
		}
		else
		{
			echo "ERROR:".$sql."<br>".$conn->error;
		}	
	}	
	$conn->close();
?>

	<form action="" method="POST">
		</div><!--/register-req-->
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
									<input type="text" name="custname" placeholder="Customer Name">
									<input type="text" name="address" placeholder="Address 1">
									<input type="text" name="mobile" placeholder="Mobile Phone">
									<input type="text" name="total" placeholder="Total amount" value="<?php echo $_GET["total"]; ?>"><br/>
									<input type="submit" name="placeorder" value="Place Order" />
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</form>	
	</section> <!--/#cart_items-->

	<!-- Start footer -->
	<?php include("footerarea.php")?>
	<!-- End footer -->
	
    <script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.scrollUp.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>