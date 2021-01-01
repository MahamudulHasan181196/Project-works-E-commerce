<?php
session_start();
/*  if(!isset($_SESSION['adminsid']) || empty($_SESSION['adminsid'])){
  header("location: login.php");
  exit;
}*/
include  '../control/DB/conn.php';

$ugender = $ud_name = $ud_phone_no = $udelivery_email = $udelivery_password = "";
$username = $_SESSION['userName'];
// echo $username;
$sql = "SELECT  *  FROM users where email	='$username'";
//echo $sql;
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$id = $row['id'];
		$ugender = $row['gender'];
		$ud_fname = $row['firstname'];
		$ud_lname = $row['lastname'];
		$ud_phone_no = $row['phone'];
		$ud_address_no = $row['homeAddress'];
		$udelivery_email = $row['email'];
		$ud_blood = $row['blood'];
		$udelivery_password = $row['userPassword'];
	}
}

$gender = $d_fname = $d_lname = $d_phone_no = $delivery_email = $delivery_address = $delivery_blood = $delivery_password = $con_delivery_password = $submitmsg = "";
$err_gender = $err_d_fname = $err_d_lname = $err_d_phone_no = $err_delivery_email = $err_delivery_address = $err_delivery_blood = $err_delivery_password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$gender = test_input($_POST["gender"]);
	$d_fname = test_input($_POST["d_fname"]);
	$d_lname = test_input($_POST["d_lname"]);
	$d_phone_no = test_input($_POST["d_phone_no"]);
	$delivery_email = test_input($_POST["delivery_email"]);
	$delivery_address = test_input($_POST["delivery_address"]);
	$delivery_blood = test_input($_POST["delivery_blood"]);
	$delivery_password = test_input($_POST["delivery_password"]);
	$con_delivery_password = test_input($_POST["con_delivery_password"]);
	date_default_timezone_set('Asia/Dhaka');
	$date = date('m/d/Y h:i:s a', time());
	//echo ctype_digit($d_fname);
	if ($delivery_password == $con_delivery_password) {
		$q = "UPDATE `users` SET `userPassword` = '$delivery_password', `firstname` = '$d_fname', `lastname` = '$d_lname', `phone` = '$d_phone_no', `gender` = '$gender', `homeAddress` = '$delivery_address', `email` = '$delivery_email', `blood` = '$delivery_blood' WHERE `users`.`email` = '$username'";
		//echo $q;
		if ($gender == "") {
			$err_gender = "Gender required";
		} else if ($d_fname == "") {
			$err_d_fname = "First Name required";
		} else if (ctype_digit($d_fname)) {
			$err_d_fname = "Character required";
		} else if ($d_lname == "") {
			$err_d_lname = "Last Name required";
		} else if (ctype_digit($d_lname)) {
			$err_d_lname = "Character required";
		} else if ($d_phone_no == "") {
			$err_d_phone_no = "Phone no required";
		} else if (!ctype_digit($d_phone_no)) {
			$err_d_phone_no = "Number required";
		} else if ($delivery_email == "") {
			$err_delivery_email = "Email required";
		} else if ($delivery_address == "") {
			$err_delivery_address = "Delivery address required";
		} else if (ctype_digit($delivery_address)) {
			$err_delivery_address = "Character required";
		} else if ($delivery_blood == "") {
			$err_delivery_blood = "Delivery blood required";
		} else if (ctype_digit($delivery_blood)) {
			$err_delivery_blood = "Character required";
		} else {
			$query = mysqli_query($con, $q);
			$submitmsg = "successfully updated";
		}
	} else {
		$submitmsg = "please give same password";
	}
}
function test_input($data)
{
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
	<link rel="stylesheet" href="editDeliverProfile.css">
	<link rel="stylesheet" type="text/css" href="../css/mystyle.css" >
	<link rel="stylesheet" type="text/css" href="../css/footer.css" >
	<link rel="stylesheet" type="text/css" href="../css/colorchng.css" >
	<div class="sticky">
<div class="header"><h3>Update</h3></div>
<div class="topnav">
<a href="DeliveryHome.php"> < </a>

</div>
</div>
	<style>
		body {
			background-color: antiquewhite;
		}
	</style>
</head>

<body>
	<center>
		<h1>Update here</h1>
	</center>
	<center>
		<h3><a href="DeliveryHome.php">Back to Profile</a></h3>
	</center>

	<center>
		<div class="container">
			<form action="" method="post" onsubmit="return validation()" enctype="multipart/form-data">

				<div class="form-group">
					<h4>Select Gender</h4>
					<input type="radio" id="gender" name="gender" value="male" <?php if ($ugender == "male") {
																					echo "checked";
																				} ?>>
					<label for="male">Male</label><br>
					<input type="radio" id="gender" name="gender" value="female" <?php if ($ugender == "female") {
																						echo "checked";
																					} ?>>
					<label for="female">Female</label><br>
					<input type="radio" id="gender" name="gender" value="other" <?php if ($ugender == "other") {
																					echo "checked";
																				} ?>>
					<label for="other">Other</label>
					<div id="genderId"><?php echo $err_gender ?></div>
				</div>

				<div>
					<h4> Deliveryman First Name</h4>
					<input type="text" name="d_fname" id="d_fname" value="<?php echo $ud_fname ?>" autocomplete="off">
					<div id="fnameId"><?php echo $err_d_fname ?></div>

				</div>
				<div>
					<h4> Deliveryman Last Name</h4>
					<input type="text" name="d_lname" id="d_lname" value="<?php echo $ud_lname ?>" autocomplete="off">
					<div id="lnameId"><?php echo $err_d_lname ?></div>

				</div>
				<div>
					<h4> Phone No </h4>
					<input type="text" name="d_phone_no" id="d_phone_no" value="<?php echo $ud_phone_no ?>" autocomplete="off">
					<div id="phonenoId"><?php echo $err_d_phone_no ?></div>

				</div>

				<div>
					<h4> Email: </h4>
					<input type="email" name="delivery_email" id="delivery_email" value="<?php echo $udelivery_email ?>" autocomplete="off">
					<div id="emailId"><?php echo $err_delivery_email ?></div>

				</div>
				<div>
					<h4> Address: </h4>
					<input type="text" name="delivery_address" id="delivery_address" value="<?php echo $ud_address_no ?>" autocomplete="off">
					<div id="addressId"><?php echo $err_delivery_address ?></div>

				</div>
				<div>
					<h4> Blood: </h4>
					<input type="text" name="delivery_blood" id="delivery_blood" value="<?php echo $ud_blood ?>" autocomplete="off">
					<div id="bloodId"><?php echo $err_delivery_blood ?></div>

				</div>

				<div>
					<h4> Password: </h4>
					<input type="password" name="delivery_password" id="delivery_password" value="<?php echo $udelivery_password ?>" autocomplete="off">
				</div>
				<div>
					<h4>Confirm Password: </h4>
					<input type="password" name="con_delivery_password" value="<?php echo $udelivery_password ?>" autocomplete="off">
					<div id="passId"></div>
				</div>

				<br><br>
				<input type="submit" name="submit" value="Update" autocomplete="off">
				<br>
				<?php echo $submitmsg ?>

			</form>
		</div>
	</center>

	<br><br>

<br>

<br><br>
      <div class="footer">
  <p>© 2020 Manik|Nowrin|Syed|Mahamudul All Rights Reserved</p>
  <p><a href="AboutUs.php">About Us</a></p>
</div>
</body>
<script src="editDeliverProfile.js"></script>

<script type="text/javaScript">

</script>

</html>