<?php
session_start();
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
	//$sql="INSERT INTO table name(_ID, NAME) VALUES (1004,'VEDANT')";

	//isset();

	//Die();
	if (isset($_POST["login"])) 
	{
		
		if($_POST["usertype"]=="admin")
		{

		$sql="SELECT * from admin_table where mail_id='".$_POST["mail_id"]."' and password ='".$_POST["password"]."'";
		$result=$conn->query($sql);
		$row=$result->fetch_assoc();
		$count=$result->num_rows;
		//echo $count;
		//die();
		if ( $count>0) 
		{
			$_SESSION["email"]=$row["mail_id"];
			$_SESSION["id"]=$row["admin_id"];
			header("location:admin/category.php");
		}
		else
		{
			echo '<script>alert("Email and Password Wrong.. Please Try again")</script>';
			
		}	
		}
		if($_POST["usertype"]=="customer")
		{

		$sql="SELECT * from customer_table where mail_id='".$_POST["mail_id"]."' and password ='".$_POST["password"]."'";
		$result=$conn->query($sql);
		$row=$result->fetch_assoc();
		$count=$result->num_rows;
		//echo $count;
		//die();
		if ( $count>0) 
		{
			$_SESSION["email"]=$row["mail_id"];
			$_SESSION["id"]=$row["cust_id"];
			header("location:customer/index.php");
			//echo"login success";
		}
		else
		{
			echo '<script>alert("Email and Password Wrong.. Please Try again")</script>';
		}	
		}

		//echo $sql;

		//die();

		
	}	
	$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home</title>
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
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="" method="POST" >
							<input type="email" name="mail_id" placeholder="Email Address" />
							<input type="password" name="password" placeholder="Password" />
							<input type="radio" name="usertype" value="admin" style="height:20px;width:20px;display:inline"/> Admin
							<input type="radio" checked name="usertype" value="customer"  style="height:20px;width:20px;display:inline" /> Customer
							<input type="submit" name="login" value="Login" />
						<br/>
							<br/>
							<!--<span>
								<input type="checkbox" class="checkbox">Keep me signed in
							</span> -->
							
						</form>
					</div><!--/login form-->
				</div>

				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
<?php
$servername="localhost"; //local server name default localhost
$username="root";  //mysql username default is root.
$password="";       //blank if no password is set for mysql.
$database="offerbazar";  //database name which you created
$conn=new mysqli($servername,$username,$password,$dbname);

	//CHECK CONNECTION
	if ($conn->connect_error) 
	{
		die("connection failed:".$conn->connect_error);
	}

	If(isset($_POST['submit']))
	{
			$sql="insert into customer_table values('','".$_POST['username']."', '".$_POST['password']."', '".$_POST['mobile']."', '".$_POST['mail_id']."','".$_POST['address']."')";
			//echo $sql;
			//die();
			$result=$conn->query($sql);
		if ($result===TRUE) 
		{
				echo '<script>alert("Register Successfully")</script>';
		}
		else
		{
				echo '<script>alert("Register Unsuccessfully..Try Again")</script>';
			//echo "ERROR:".$sql."<br>".$conn->error;
		}
	}	
$conn->close();
?>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="" method="POST">
							<input type="text" name="username" placeholder="Name" />
							<input type="email" name="mail_id" placeholder="Email Address" />
							<input type="tel" name="mobile" placeholder="Mobile"  />
							<input type="password" name="password" placeholder="Password" />
							<input type="address" name="address" placeholder="Address" />
							<input type="submit" name="submit" value="Register" />
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	<!-- Start Footer -->
	<?php include("footerarea.php")?>
	<!-- End Footer -->
	  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>