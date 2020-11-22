<!DOCTYPE html>
<html>
<body>

<h3>Order Details</h3>

<?php
   include('../control/DB/conn.php');
     $sqlget = "SELECT * FROM orders";
     $sqldata = mysqli_query($con, $sqlget) or die('Error');

     echo "<table style='width:100%' border='1'>";
     echo "<tr> <th>Order ID</th> <th>Product ID</th> <th>Buyer ID</th> <th>Quantity</th> <th>Total Price</th>  <th>Delivery Status</th>  </tr>";
     while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
           
      echo "<tr><td>";
      echo $row['oId'];
      echo "</td><td>";
      echo $row['pId'];
      echo "</td><td>";
      echo $row['bId'];
      echo "</td><td>";
      echo $row['quantity'];
      echo "</td><td>";
      echo $row['totalPrice'];
      echo "</td><td>";
      echo $row['status']    .   "<button type='button'>Update status</button>";
      echo "</td></tr>";

     }
     echo "</table>";
 ?>
 <br><br>
 <input type="text" id="Search" name="Search"><button type="button">Search</button>
<br><br>
 <a href="DeliveryHome.php">Back</a>
 </body>
</html>
