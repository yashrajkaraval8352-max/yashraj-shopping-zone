<?php
include("../includes/db.php");

$result = mysqli_query($conn, "SELECT * FROM products");

while ($row = mysqli_fetch_assoc($result)) {

    echo $row['name'] . " - " . $row['price'];

    echo "<br>";

}
?>