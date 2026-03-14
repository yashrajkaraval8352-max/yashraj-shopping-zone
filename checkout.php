<?php
session_start();
include("includes/db.php");

/* LOGIN CHECK */
if (!isset($_SESSION['user'])) {
    echo "Please login first";
    exit();
}

/* CART CHECK */
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Your cart is empty";
    exit();
}

$total = 0;

/* CALCULATE TOTAL */

foreach ($_SESSION['cart'] as $pid) {

    $pid = intval($pid);

    $q = "SELECT price FROM products WHERE id=$pid";
    $r = mysqli_query($conn, $q);

    if ($r && mysqli_num_rows($r) > 0) {

        $p = mysqli_fetch_assoc($r);
        $total += $p['price'];

    }
}

$user = intval($_SESSION['user']);

/* INSERT ORDER */

mysqli_query($conn, "INSERT INTO orders(user_id,total) VALUES($user,$total)");

/* CLEAR CART */

unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Order Success</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="success-page">

    <div class="success-box">

        <h1>🎉 Congratulations!</h1>

        <p>Your order has been placed successfully.</p>

        <a href="shop.php" class="continue-btn">Continue Shopping</a>

    </div>

    <div class="confetti"></div>

</body>

</html>