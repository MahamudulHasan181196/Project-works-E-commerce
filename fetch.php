<?php
include('../control/DB/conn.php');
$output = '';
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($con, $_POST["query"]);
    $query = "SELECT * FROM orders  WHERE `oId` LIKE '%" . $search . "%' OR `pId` LIKE '%" . $search . "%' OR `bId` LIKE '%".$search. "%' OR `quantity` LIKE '%".$search. "%' OR `totalPrice` LIKE '%".$search."%'";
    //echo $query;
} else {
    $query = "SELECT * FROM orders";
}
//$sqlget = "SELECT * FROM orders";
$result = mysqli_query($con, $query) or die('Error');

if (mysqli_num_rows($result) > 0) {
       echo "<tr><th>Order ID</th><th>Product Id</th><th>Buyer ID</th><th>Quantity</th><th>Total Price</th><th>Delivery Status</th></tr>"; 
    while ($row = mysqli_fetch_assoc($result)) {
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
        echo $row['status'];
        echo "<a class='btn' href='UpdateOrderStatus.php?id=" . $row["oId"] . "'><button>Update Status</button></a>";
        echo "</td></tr>";
        echo $output;
    }
}
else {
    echo 'Data Not Found';
}

?>