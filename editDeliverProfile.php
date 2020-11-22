<?php
session_start();
 /*  if(!isset($_SESSION['adminsid']) || empty($_SESSION['adminsid'])){
  header("location: login.php");
  exit;
}*/
include  '../control/DB/conn.php';

$ugender = $ud_name = $ud_phone_no = $udelivery_email = $udelivery_password="";
/*$uid=$_SESSION['adminsid'];
$sql = "SELECT  *  FROM deliveryman where id='$uid'";
         $result = mysqli_query($conn, $sql);
		 if (mysqli_num_rows($result) > 0){
		 while($row = mysqli_fetch_assoc($result)){
			       $id=$row['id'];
             $ugender=$row['d_gender'];
             $ud_name=$row['d_name'];
             $ud_phone_no=$row['d_phone_no'];
             $udelivery_email=$row['delivery_email'];
             $udelivery_password=$row['delivery_password'];
            	 
		}
		 
	}*/

$gender = $d_name = $d_phone_no = $delivery_email = $delivery_password = $con_delivery_password=$submitmsg="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $gender = test_input($_POST["gender"]);
  $d_name = test_input($_POST["d_name"]);
  $d_phone_no = test_input($_POST["d_phone_no"]);
  $delivery_email = test_input($_POST["delivery_email"]);
  $delivery_password = test_input($_POST["delivery_password"]);
  $con_delivery_password = test_input($_POST["con_delivery_password"]);
  date_default_timezone_set('Asia/Dhaka');
  $date = date('m/d/Y h:i:s a', time());

  if ($delivery_password==$con_delivery_password) {
	  	 $q="UPDATE `deliveryman` SET `d_gender` = '$gender', `d_name` = '$d_name', `d_phone_no` = '$d_phone_no', `delivery_email` = '$delivery_email', `delivery_password` = '$delivery_password', `updated_time` = '$date' WHERE `deliveryman`.`id` = $uid";
	  	 //echo $q;
	  	 $query=mysqli_query($conn,$q);
		 $submitmsg="successfully updated";
		 header("location: profile.php");
  }
  else{
		 $submitmsg="please give same password";
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update here</title>
</head>
<body>
<center><h1>Update here</h1></center>
<center><h3><a href="DeliveryHome.php">Back to Profile</a></h3></center>

<center>	
<form action="" method="post" onsubmit="return validation()" class="bg-light" enctype="multipart/form-data">
				
				<div class="form-group">
				      <h4>Select Gender</h4>
					  <input type="radio" id="male" name="gender" value="male" <?php if($ugender=="male"){ echo "checked";}?>>
					  <label for="male">Male</label><br>
					  <input type="radio" id="female" name="gender" value="female" <?php if($ugender=="female"){ echo "checked";}?>>
					  <label for="female">Female</label><br>
					  <input type="radio" id="other" name="gender" value="other" <?php if($ugender=="other"){ echo "checked";}?>>
					  <label for="other">Other</label>
				</div>

				<div>
					<h4> Deliveryman Name</h4>
					<input type="text" name="d_name" value="<?php echo $ud_name?>"  autocomplete="off">
				</div>

				<div>
					<h4> Phone No </h4>
					<input type="text" name="d_phone_no" value="<?php echo $ud_phone_no?>"  autocomplete="off">
				</div>

				<div>
					<h4> Emial: </h4>
					<input type="email" name="delivery_email" value="<?php echo $udelivery_email?>"  autocomplete="off" required>
				</div>

				<div>
					<h4> Password: </h4>
					<input type="password" name="delivery_password" value="<?php echo $udelivery_password?>" autocomplete="off" required>
				</div>
				<div>
					<h4>Confirm Password: </h4>
					<input type="password" name="con_delivery_password" value="<?php echo $udelivery_password?>" autocomplete="off" required>
				</div>

				<br><br>
				<input type="submit" name="submit" value="Update"  	autocomplete="off">
                 <br>
                 <?php echo $submitmsg?>

			</form><br><br>
			</center>
</body>
</html>