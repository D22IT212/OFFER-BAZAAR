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
    <title>EDIT PROFILE</title>
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
						<h2>EDIT PROFILE</h2>
						<div>
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

if(isset($_POST["submit"]))
{
$sql="UPDATE customer_table set username='".$_POST["username"]."',mail_id='".$_POST["mail_id"]."',mobile='".$_POST["mobile"]."',password='".$_POST["password"]."',address='".$_POST["address"]."' where cust_id='".$_SESSION["id"]."'";
$result=$conn->query($sql);
if($result==true)
{
	
		echo '<script>alert("profile updated successfully")</script>';
//echo "profile updated successfully";

}
}
?>
							
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

		$sql="SELECT * FROM customer_table where cust_id=".$_SESSION["id"];
			//echo $sql;
			//die();
			$result=$conn->query($sql);
		$row=$result->fetch_assoc();
?>
							<div class="col-sm-4">
								<div class="signup-form"><!--sign up form-->
								<h2>Profile Update!</h2>
									<form action="#" method="post">
									<input type="text" name="username" value="<?php echo $row["username"]; ?>" placeholder="Name" style="width:350px"/>
									<input type="email" name="mail_id" placeholder="Email Address" value="<?php echo $row["mail_id"]; ?>" style="width:350px" />
									<input type="tel" name="mobile" placeholder="Mobile"  value="<?php echo $row["mobile"]; ?>" style="width:350px" />
									<input type="password" name="password" value="<?php echo $row["password"]; ?>"  placeholder="Password" style="width:350px" />
									<input type="address" name="address" value="<?php echo $row["address"]; ?>"  placeholder="Address" style="width:350px" />
									<input type="submit" name="submit" value="Update"/>
									</form>
								</div><!--/sign up form-->
							</div>
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