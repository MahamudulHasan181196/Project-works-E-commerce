<?php

session_start();
if (empty($_SESSION["userName"])) {
    header("Location: Login.php"); // Redirecting To Home Page
}
?>
<?php
$orderId = $_GET['id'];
include  '../control/DB/conn.php';

$status = "";
$post_status = "";
//$username = $_SESSION['userName'];
// echo $username;
$sql = "SELECT  *  FROM orders where oId	='$orderId'";
//echo $sql;
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        //$id = $row['oId'];
        $status = $row['status'];
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_status = $_POST['status'];
    $q = "UPDATE `orders` SET `status` = '$post_status' WHERE `orders`.`oId` = $orderId";
    $query = mysqli_query($con, $q);
    $submitmsg = "successfully updated";
    //echo $submitmsg;
    header("location:CheckOrderDeliver.php");
}
?>
<html>

<head>

</head>

<body>
    <form method="POST" action="">
        <label>Update Status: </label>
        <select name="status">
            <option value="accept" <?php if ($status == 'accept') {
                                        echo ' selected="selected"';
                                    } ?>>Accept</option>
            <option value="ontheway" <?php if ($status == 'ontheway') {
                                            echo ' selected="selected"';
                                        } ?>>On the Way</option>
            <option value="confirmed" <?php if ($status == 'confirmed') {
                                            echo ' selected="selected"';
                                        } ?>>Confirmed</option>
            <option value="rejected" <?php if ($status == 'rejected') {
                                            echo ' selected="selected"';
                                        } ?>>Rejected</option>
        </select>
        <input type="submit" value="Update">
    </form>
</body>

</html>