<?php
include("config.php");
session_start();
   if(!isset($_SESSION['adminsid']) || empty($_SESSION['adminsid'])){
  header("location: login.php");
  exit;
}
$gender = $d_name = $d_phone_no = $delivery_email = $delivery_password = $con_delivery_password=$submitmsg="";
$uid=$_SESSION['adminsid'];
$sql = "SELECT  *  FROM deliveryman where id='$uid'";
         $result = mysqli_query($conn, $sql);
		 if (mysqli_num_rows($result) > 0) {
		 while($row = mysqli_fetch_assoc($result)) {
			       $id=$row['id'];
             $gender=$row['d_gender'];
             $d_name=$row['d_name'];
             $d_phone_no=$row['d_phone_no'];
             $delivery_email=$row['delivery_email'];
            	 
		 }
		 
		 }
?>

<!DOCTYPE html>
<html>
<head>
 <title>Profile Page</title>
</head>
<body>


<div id="maincontainer">
  <h2>Your Profile</h2>
  <br>
  <h3><a href="editprofile.php">Edit your Profile</a></h3>
  <h3><a href="dashborad.php">Back to dashboard</a></h3>
  <div class="information"><?php
        echo "<div class='leftinfo'>";
    		echo "<div class='username'><h3>your username:</h3>".$d_name."</div><br>";
    		echo "<div class='address'><h3>Your address:</h3>".$gender."</div><br>";
    		echo "</div>";
    		echo "<div class='rightinfo'>";
    		echo "<div class='phoneno'><h3>your phone No</h3>".$d_phone_no."</div><br>";
    		echo "<div class='email'><h3>Your email</h3>".$delivery_email."</div><br>";
    		echo "</div>";
  ?></div>
</div>
     
</body>.
</html> 
