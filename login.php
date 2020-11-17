<?php
   include("config.php");
    session_start();
    $error="";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //echo $_POST['uname'];
        $myusername = mysqli_real_escape_string($conn,$_POST['uname']);
        $mypassword = mysqli_real_escape_string($conn,$_POST['psw']); 
        $sql = "SELECT id FROM deliveryman WHERE delivery_email = '$myusername' and delivery_password = '$mypassword'";
        //echo $sql;
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $id=$row['id'];
        $_SESSION['adminsid']=$id;
        $count = mysqli_num_rows($result);
       // echo $count;

      if($count == 1){
        header("location:dashborad.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!DOCTYPE html>
<html>
<head>
<title>Delevery Man login</title>
</head>
<body>

<h2>Login Form</h2>

<form action="" method="POST">
  

  <div >
    <label for="uname"><b>Emial</b></label>&nbsp;&nbsp;&nbsp;
    <input type="text" placeholder="Enter Email" name="uname" required>
    <br/><br/><br/>
    <label for="psw"><b>Password</b></label>&nbsp;&nbsp;&nbsp;
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br/><br/> 
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name="login" value="Login">
    
  </div>
    <br/>
    <?php echo $error; ?>
  <div >
    <span class="psw"><a href="registration.php">Register Now</a></span>
  </div>
</form>

</body>
</html>
