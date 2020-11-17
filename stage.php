<?php
	session_start();
	$id=$_SESSION['adminsid'];

	if(!isset($_SESSION['adminsid']) || empty($_SESSION['adminsid'])){
	  header("location: login.php");
	  exit;
	}
  include  'config.php';
 $id=$_GET['id'];
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $delevery = $_POST["delevery"];
     date_default_timezone_set('Asia/Dhaka');
     $date = date('m/d/Y h:i:s a', time());
	 $q="UPDATE `delevery_details` SET `delivery_condition` = '$delevery', `updated_time` = '$date' WHERE `delevery_details`.`id` = $id"; 
	 mysqli_query($conn,$q);
	 //echo $q;
	 header('location:dashborad.php');
   }

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="POST">
	<label for="Delevery stage">Delivery Stage:</label>

	<select name="delevery" id="cars">
	  <option value="acept">Accept</option>
	  <option value="ongoing">Ongoing</option>
	  <option value="deliverd">Deliverd</option>
	  <option value="canceled">User canceled</option>
	</select>
<br/><br/>

	<input type="submit" name="" value="update">
</form>
<h3><a href="dashborad.php">Back to dashboard</a></h3>
</body>
</html>