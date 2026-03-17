<?php
session_start();
include("includes/db.php");
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