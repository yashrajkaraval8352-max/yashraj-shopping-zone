<?php
session_start();
include("includes/db.php");

$user = $_SESSION['user'];

$q = "SELECT * FROM orders WHERE user_id=$user";
$r = mysqli_query($conn, $q);

echo "<h2>Your Orders</h2>";

while ($row = mysqli_fetch_assoc($r)) {

    echo "Order ID: " . $row['id'] . " | Total ₹" . $row['total'] . "<br>";

}
?>