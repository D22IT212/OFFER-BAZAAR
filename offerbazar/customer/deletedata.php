<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "offerbazar";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	
  die("Connection failed: " . $conn->connect_error);
}

$sql="delete from cart_table where cart_id=".$_GET["id"]."";
 echo $sql;
$result=$conn->query($sql);
if($result===true)
{	
	header("Location:cart.php");

}
$conn->close();
?>