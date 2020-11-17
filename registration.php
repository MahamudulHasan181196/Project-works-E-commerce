
<?php
include  'config.php';
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
	  	 $q="INSERT INTO `deliveryman`(`d_gender`, `d_name`, `d_phone_no`, `delivery_email`, `delivery_password`,`created_time`) VALUES ('$gender','$d_name','$d_phone_no','$delivery_email','$delivery_password','$date')";
	  	 //echo $q;
	  	 $query=mysqli_query($conn,$q);
		 $submitmsg="success";
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
	<title>Registration here</title>
</head>
<body>
<center><h1>Registration here</h1></center>
<center>	
<form action="" method="post" onsubmit="return validation()" class="bg-light" enctype="multipart/form-data">
				
				<div class="form-group">
				      <h4>Select Gender</h4>
					  <input type="radio" id="male" name="gender" value="male">
					  <label for="male">Male</label><br>
					  <input type="radio" id="female" name="gender" value="female">
					  <label for="female">Female</label><br>
					  <input type="radio" id="other" name="gender" value="other">
					  <label for="other">Other</label>
				</div>

				<div>
					<h4> Deliveryman Name</h4>
					<input type="text" name="d_name"  autocomplete="off">
					<span id="passwords" class="text-danger font-weight-bold"> </span>
				</div>

				<div>
					<h4> Phone No </h4>
					<input type="text" name="d_phone_no"  autocomplete="off">
					<span id="confrmpass" class="text-danger font-weight-bold"> </span>
				</div>

				<div>
					<h4> Emial: </h4>
					<input type="email" name="delivery_email"  autocomplete="off" required>
					<span id="mobileno" class="text-danger font-weight-bold"> </span>
				</div>

				<div>
					<h4> Password: </h4>
					<input type="password" name="delivery_password"  autocomplete="off" required>
					<span id="emailids" class="text-danger font-weight-bold"> </span>
				</div>
				<div>
					<h4>Confirm Password: </h4>
					<input type="password" name="con_delivery_password"  autocomplete="off" required>
					<span id="emailids" class="text-danger font-weight-bold"> </span>
				</div>

				<br><br>
				<input type="submit" name="submit" value="submit"  	autocomplete="off">
                 <br>
                 <?php echo $submitmsg?>

			</form><br><br>
			<a href="login.php">Login here</a>
			</center>
</body>
</html>