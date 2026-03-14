<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location:admin_login.php");
}
?>

<h1>Admin Dashboard</h1>

<a href="add_product.php">Add Product</a>

<a href="view_products.php">View Products</a>