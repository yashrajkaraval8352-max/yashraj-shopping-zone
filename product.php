<?php
include("includes/header.php");
include("includes/db.php");

if (!isset($_GET['id'])) {
    echo "Product not found";
    exit();
}

$id = intval($_GET['id']);

$query = "SELECT * FROM products WHERE id='$id'";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Product not found";
    exit();
}

$row = mysqli_fetch_assoc($result);

/* REVIEW SUBMIT */

if (isset($_POST['submit_review'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $review = mysqli_real_escape_string($conn, $_POST['review']);
    $rating = intval($_POST['rating']);

    $insert = "INSERT INTO reviews(product_id,name,review,rating)
               VALUES('$id','$name','$review','$rating')";

    if (mysqli_query($conn, $insert)) {
        header("Location: product.php?id=" . $id);
        exit();
    }
}
?>

<!-- PRODUCT SECTION -->

<div class="product-page">

    <!-- IMAGE -->

    <div class="product-image-box">
        <img src="images/<?php echo htmlspecialchars($row['image']); ?>" class="product-image"
            onclick="openImage(this.src)">
    </div>


    <!-- DETAILS -->

    <div class="product-details">

        <h2>
            <?php echo htmlspecialchars($row['name']); ?>
        </h2>

        <p class="description">
            <?php echo htmlspecialchars($row['description']); ?>
        </p>

        <h3 class="price">₹
            <?php echo htmlspecialchars($row['price']); ?>
        </h3>

        <div class="rating">
            ⭐⭐⭐⭐☆
        </div>

        <form action="cart.php" method="get">

            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <div class="quantity-box">

                <button type="button" onclick="changeQty(-1)">-</button>

                <input type="number" id="qty" name="qty" value="1" min="1">

                <button type="button" onclick="changeQty(1)">+</button>

            </div>

            <button type="submit" class="cart-btn">
                Add To Cart
            </button>

        </form>

    </div>

</div>



<!-- REVIEWS FULL WIDTH -->

<div class="review-section">

    <h2>Customer Reviews</h2>

    <form method="post" class="review-form">

        <input type="text" name="name" placeholder="Your Name" required>

        <select name="rating">
            <option value="5">⭐⭐⭐⭐⭐</option>
            <option value="4">⭐⭐⭐⭐</option>
            <option value="3">⭐⭐⭐</option>
            <option value="2">⭐⭐</option>
            <option value="1">⭐</option>
        </select>

        <textarea name="review" placeholder="Write your review" rows="3" required></textarea>

        <button type="submit" name="submit_review">
            Submit Review
        </button>

    </form>

    <hr>

    <?php

    $review_query = "SELECT * FROM reviews WHERE product_id='$id' ORDER BY id DESC";
    $review_result = mysqli_query($conn, $review_query);

    if ($review_result && mysqli_num_rows($review_result) > 0) {

        while ($rev = mysqli_fetch_assoc($review_result)) {

            echo "<div class='review-box'>";

            echo "<strong>" . htmlspecialchars($rev['name']) . "</strong><br>";

            echo "Rating: " . htmlspecialchars($rev['rating']) . " ⭐<br>";

            echo "<p>" . htmlspecialchars($rev['review']) . "</p>";

            echo "</div>";

        }

    } else {

        echo "<p style='text-align:center;'>No reviews yet</p>";

    }

    ?>

</div>



<!-- IMAGE POPUP -->

<div id="imagePopup" class="image-popup">
    <span class="close" onclick="closeImage()">&times;</span>
    <img id="popupImg">
</div>


<script>

    function changeQty(value) {

        let qty = document.getElementById("qty");

        let current = parseInt(qty.value);

        current = current + value;

        if (current < 1) {
            current = 1;
        }

        qty.value = current;

    }

    /* IMAGE POPUP */

    function openImage(src) {
        document.getElementById("popupImg").src = src;
        document.getElementById("imagePopup").style.display = "flex";
    }

    function closeImage() {
        document.getElementById("imagePopup").style.display = "none";
    }

</script>

<?php include("includes/footer.php"); ?>