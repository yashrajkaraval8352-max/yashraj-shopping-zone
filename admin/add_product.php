<?php
include("../includes/db.php");

if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['description'];

    $image = $_FILES['image']['name'];

    move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $image);

    mysqli_query($conn, "INSERT INTO products(name,price,image,description)
VALUES('$name','$price','$image','$desc')");

    echo "Product added";

}
?>

<form method="POST" enctype="multipart/form-data">

    <input type="text" name="name" placeholder="Product Name">

    <input type="number" name="price" placeholder="Price">

    <textarea name="description"></textarea>

    <input type="file" name="image">

    <button name="add">Add Product</button>

</form>