<?php  

session_start(); 
if(empty($_SESSION["userName"])) 
{
header("Location: Login.php"); // Redirecting To Home Page
}
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title></title>
    </head>
    <body>
    <center>
    <h2>Welcome To DeliveryMan Home Page</h2>
    <h4>Deliveryman Details:</h4>

     <h5> <?php// echo "Loged Email: " . $_SESSION["userName"];?></h5> 
    
<?php
   include('../control/DB/conn.php');
     $sqlget = "SELECT * FROM users WHERE email='".$_SESSION["userName"]."' ";
     $sqldata = mysqli_query($con, $sqlget) or die('Error');
     while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
           echo " ID   :    ". $row['id']."<br>";
           echo " Name     :   ".     $row['firstname'] ."    ". $row['lastname']."<br>";
           echo "Phone Number : ". $row['phone']."<br>"."Address : ".$row['homeAddress']."<br>";
           echo "Email  :". $row['email']."<br>";

     }
 ?>
 <br>
 <a href="editDeliverProfile.php"> Update My Profile </a>

 <br><br>
    <a href="CheckOrderDeliver.php"> Check Order & Delivery </a>
     <br> <br>
     </center>
    <h5>Do you want to <a href="Logout.php">Logout</a></h5>
    </body>
</html>