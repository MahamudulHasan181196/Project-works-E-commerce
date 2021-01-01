<?php

session_start();
if (empty($_SESSION["userName"])) {
    header("Location: Login.php"); // Redirecting To Home Page
}
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <title></title>
    <link rel="stylesheet" href="DeliveryHome.css">
    <link rel="stylesheet" type="text/css" href="../css/mystyle.css" >
<link rel="stylesheet" type="text/css" href="../css/footer.css" >
    <link rel="stylesheet" type="text/css" href="../css/colorchng.css" >
    <div class="sticky">
<div class="header"><h3>Welcome To DeliveryMan Home Page</h3></div>
<div class="topnav">
<a href="editDeliverProfile.php"> Update My Profile </a>
<a href="CheckOrderDeliver.php"> Check Order & Delivery </a>

</div>
</div>

<br>
    <style>
        body {
            /* background-image: url('background.jpg'); */
            /* background-repeat: no-repeat; */
            background-color: antiquewhite;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2 class="title"></h2>
        <h4 class="title">Deliveryman Details</h4>
        <?php
        include('../control/DB/conn.php');
        $sqlget = "SELECT * FROM users WHERE email='" . $_SESSION["userName"] . "' ";
        $sqldata = mysqli_query($con, $sqlget) or die('Error');
        while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
            //echo "<img src='".$row["imageName"]."' >";

            echo " <h1>" .     $row['firstname'] . "    " . $row['lastname'] . "</h1>";
            echo " <p>ID   :    " . $row['id'] . "</p>";
            echo "<p>Phone Number : " . $row['phone'] . "</p>" . "<p>Address : " . $row['homeAddress'] . "</p>";
            echo "<p>Email  :" . $row['email'] . "</p>";
        }
        ?>
        <br>
       
        <a href="deleteprofile.php"><button>Delete</button></a>
        <a href="Logout.php"><button>Logout</button></a>

    </div>

<br><br>

    <br><br>

<br>


      <div class="footer">
  <p>© 2020 Manik|Nowrin|Syed|Mahamudul All Rights Reserved</p>
  <p><a href="AboutUs.php">About Us</a></p>
</div>
</body>

</html>