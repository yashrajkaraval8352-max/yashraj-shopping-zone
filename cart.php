<?php
session_start();
include("includes/db.php");
include("includes/header.php");

echo "<h2>Your Cart</h2>";

$total = 0;

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

/* ADD PRODUCT */

if (isset($_GET['id'])) {

    $id = intval($_GET['id']);
    $qty = isset($_GET['qty']) ? intval($_GET['qty']) : 1;

    if ($qty < 1) {
        $qty = 1;
    }

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] += $qty;
    } else {
        $_SESSION['cart'][$id] = $qty;
    }

    header("Location: cart.php");
    exit();
}

/* REMOVE PRODUCT */

if (isset($_GET['remove'])) {

    $remove_id = intval($_GET['remove']);

    if (isset($_SESSION['cart'][$remove_id])) {
        unset($_SESSION['cart'][$remove_id]);
    }

    header("Location: cart.php");
    exit();
}

echo "<div class='cart-container'>";

/* DISPLAY CART */

if (!empty($_SESSION['cart'])) {

    foreach ($_SESSION['cart'] as $id => $qty) {

        $query = "SELECT * FROM products WHERE id='$id'";
        $result = mysqli_query($conn, $query);

        if ($row = mysqli_fetch_assoc($result)) {

            $price = $row['price'];
            $subtotal = $price * $qty;

            echo "<div class='cart-item'>";

            echo "<img src='images/" . $row['image'] . "' class='cart-img'>";

            echo "<div class='cart-info'>";
            echo "<h4>" . $row['name'] . "</h4>";
            echo "<p>Price: ₹" . $price . "</p>";
            echo "<p>Quantity: " . $qty . "</p>";
            echo "<p>Subtotal: ₹" . $subtotal . "</p>";
            echo "</div>";

            echo "<a class='cart-remove' href='cart.php?remove=" . $id . "'>Remove</a>";

            echo "</div>";

            $total += $subtotal;

        }
    }

    echo "<h3 class='cart-total'>Total: ₹" . $total . "</h3>";

} else {

    echo "<p style='text-align:center;'>Your cart is empty</p>";
}

echo "<div style='text-align:center;'>";
echo "<a href='checkout.php' class='checkout-btn'>Checkout</a>";
echo "</div>";

echo "</div>";

include("includes/footer.php");
?>