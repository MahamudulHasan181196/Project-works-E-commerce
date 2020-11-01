<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<?php
$name = $email = $gender = $dob = $address = $password = $confirm_password = "";
$nameError=""; $emailError=""; $genderError=""; $dobError=""; $addressError=""; $passwordError=""; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $dob = $_POST["birthday"];
  $address = $_POST["address"];
  $gender = $_POST["gender"];
  $password = $_POST["password"];
if (empty($name))
{
    $nameError="Please enter your name";
}
if (empty($email))
{
    $emailError="Please enter your email";
}
if (empty($gender))
{
    $genderError="Please select your gender";
}
if (empty($dob))
{
    $dobError="Please enter your birthdate";
}
if (empty($address))
{
    $addressError="Please enter your address";
}
if (empty($password))
{
    $passwordError="Please enter your password";
}
$target_dir = "files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);



	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }


}


?>

<h2>My Registration Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"   enctype="multipart/form-data">  
  Name: <input type="text" name="name"> <?php echo $nameError; ?>
  <br><br>
  E-mail: <input type="text" name="email">
  <br><br>
  Address: <input type="text" name="address">
  <br><br>
  Dateofbirth: <input type="date" id="birthday" name="birthday"> /><br />
  Password: <input type="text" name="password">
  <br><br>
  Confirm Password: <input type="text" name="confirm_password">
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other" checked>Other
  <br>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <br>
  <input type="submit" name="submit" value="Submit">  
</form>

