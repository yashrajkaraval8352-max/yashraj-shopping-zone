<?php include("includes/header.php"); ?>
<?php include("includes/db.php"); ?>

<h2>Shop Products</h2>

<!-- CATEGORY MENU -->

<div class="shop-menu">

    <a href="shop.php">All</a>
    <a href="shop.php?category=electronics">Electronics</a>
    <a href="shop.php?category=furniture">Furniture</a>
    <a href="shop.php?category=clothing">Clothing</a>

</div>

<br>

<div class="products">

    <?php

    $query = "";

    /* CATEGORY FILTER */

    if (isset($_GET['category'])) {

        $category = $_GET['category'];
        $query = "SELECT * FROM products WHERE category='$category'";
    }

    /* SEARCH FILTER */ elseif (isset($_GET['search'])) {

        $search = $_GET['search'];
        $query = "SELECT * FROM products WHERE name LIKE '%$search%'";
    }

    /* SHOW ALL PRODUCTS */ else {

        $query = "SELECT * FROM products";
    }

    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {

        ?>

        <div class="product-card">

            <img src="images/<?php echo $row['image']; ?>">

            <h3><?php echo $row['name']; ?></h3>

            <p>₹ <?php echo $row['price']; ?></p>

            <a href="product.php?id=<?php echo $row['id']; ?>">View</a>

        </div>

    <?php } ?>

</div>

<?php include("includes/footer.php"); ?>