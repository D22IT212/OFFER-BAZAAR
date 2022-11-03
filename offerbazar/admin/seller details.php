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
	//$sql="INSERT INTO student(CATEGORY_NAME) VALUES ('PENDA')";

	//isset();

	//Die();
	if (isset($_POST["add"])) 
	{
			$sql="INSERT INTO seller_table VALUES ('','".$_POST["name"]."','".$_POST["address"]."','".$_POST["company"]."','".$_POST["mobile"]."','".$_POST["email"]."')";

		//echo $sql;

		//die();
		$msg="";
		$result=$conn->query($sql);
		if ($result===TRUE) 
		{
			$msg =$msg . "NEW RECORD CREATED SUCCESSFULLY";
		}
		else
		{
			$msg =$msg ."ERROR:".$sql."<br>".$conn->error;
		}
		
		
	  
		
		
		
		
	}	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
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
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>ADD Seller Details </h2>
						<form action="" method="post" enctype="multipart/form-data">

							<span align="center" bgcolor="lightblue"><b>Seller Name</b></span>
							
							</br>
							</br>
							<b></b>	
							<input type="text" name="name" placeholder="Seller Name" />
							</br>	
							</select>
						
							<span align="center" bgcolor="lightblue"><b>Address:</b></span>
							<input type="text" name="address" placeholder="Address">
						
									
							</br>
						<input type="text" name="company" placeholder="Company Name" />
							</br>
								<input type="text" name="mobile" placeholder="Mobile" />
							</br>
							
							<span align="center" bgcolor="lightblue"><b>Email:</b></span>
							<input type="text" name="email" placeholder="Email">
							</br>
							</br>
							
							<input type="submit" name="add" value="ADD" />
						</form>
						<?php
							if(isset($msg))
							{
								echo $msg;
							}
							?>
					</div><!--/login form-->
					<div>
	<?php
	if (isset($_POST["show"])) 
	{
	$sql="SELECT * FROM product_table";

		//echo $sql;

		//die();

	
		$result=$conn->query($sql);
	?>

<table border="1">
	<?php
	//$result=$conn->query("select * from subcategory");
	while ($row=$result->fetch_assoc()) 
	{
?>
<?php		
	}
?>
</table>
<?php
}

?>
</div>
</br>
	
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