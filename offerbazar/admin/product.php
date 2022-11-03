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
		$target_dir = "../images/home/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$msg="";
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		$msg= "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"
		])). " has been uploaded.";
		
			$sql="INSERT INTO product_table(seller_id,category_id,name,image,description,weight,Mrp_price,price) VALUES ('".$_POST["seller_id"]."','".$_POST["category_id"]."','".$_POST["name"]."','".$_FILES["fileToUpload"]["name"]."','".$_POST["description"]."','".$_POST["weight"]."','".$_POST["Mrp_price"]."','".$_POST["price"]."')";

		//echo $sql;

		//die();
		
		$result=$conn->query($sql);
		if ($result===TRUE) 
		{
			$msg =$msg . "NEW RECORD CREATED SUCCESSFULLY";
		}
		else
		{
			$msg =$msg ."ERROR:".$sql."<br>".$conn->error;
		}
		
		
	  } else {
		$msg= "Sorry, there was an error uploading your file.";
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
						<h2>ADD Product </h2>
						<form action="" method="post" enctype="multipart/form-data">

							<span align="center" bgcolor="lightblue"><b></b></span>
							<select name="category_id">
							<?php
							$result=$conn->query("select * from category_table");
							while ($row=$result->fetch_assoc()) 
							{
								//print_r($row);
								//die();
							?>
								<option value="<?php echo $row["category_id"]; ?>">
									<?php echo $row["category_name"]; ?>
								</option>
							<?php		
							}
							?>
							</select>
							</br>
							</br>
							<b></b>	
							<input type="text" name="name" placeholder="PRODUCT" />
							</br>	
							</select>
							
							
							<span align="center" bgcolor="lightblue"><b>MRP PRICE:</b></span>
							<input type="text" name="Mrp_price">
						
							<span align="center" bgcolor="lightblue"><b>DISCOUNT PRICE:</b></span>
							<input type="text" name="price">
							<span align="center" bgcolor="lightblue"><b>PHOTO:</b></span>
					
						  <input type="file" name="fileToUpload" id="fileToUpload">		
									
							</br>
						<input type="text" name="description" placeholder="description" />
							</br>
								<input type="text" name="weight" placeholder="extra details" />
							</br>
							<span align="center" bgcolor="lightblue"><b>SELLER:</b></span>
							<select name="seller_id">
							<?php
							$result=$conn->query("select * from seller_table");
							while ($row=$result->fetch_assoc()) 
							{
								//print_r($row);
								//die();
							?>
								<option value="<?php echo $row["seller_id"]; ?>">
									<?php echo $row["sname"]; ?>
								</option>
							<?php		
							}
							?>
							</select>
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