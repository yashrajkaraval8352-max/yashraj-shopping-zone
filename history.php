<?php
session_start();
include("includes/header.php");
include("includes/db.php");

if (!isset($_SESSION['user'])) {
    echo "Please login first";
    exit();
}

$user = $_SESSION['user'];

$query = "SELECT * FROM orders WHERE user_id=$user ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<h2>My Order History</h2>

<table>

    <tr>
        <th>Order ID</th>
        <th>Total Amount</th>
        <th>Date</th>
    </tr>

    <?php

    while ($row = mysqli_fetch_assoc($result)) {

        ?>

        <tr>

            <td>
                <?php echo $row['id']; ?>
            </td>

            <td>₹
                <?php echo $row['total']; ?>
            </td>

            <td>
                <?php echo $row['created_at']; ?>
            </td>

        </tr>

        <?php
    }
    ?>

</table>

<?php include("includes/footer.php"); ?>