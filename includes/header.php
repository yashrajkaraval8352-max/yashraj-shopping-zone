<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Yashraj Shopping Zone</title>

    <link rel="stylesheet" href="/shopping-website/css/style.css">

</head>

<body>

    <header class="header">

        <div class="logo">
            <h2>Yashraj Shopping Zone</h2>
        </div>

        <div class="search">

            <form action="shop.php" method="GET" style="display:flex; margin:0; padding:0;">

                <input type="text" name="search" placeholder="Search products">

                <button type="submit">Search</button>

            </form>

        </div>

        <div class="menu">

            <a href="index.php">Home</a>
            <a href="shop.php">Shop</a>
            <a href="cart.php">Cart</a>
            <a href="history.php">My Orders</a>
            <a href="profile.php">Profile</a>
            <a href="login.php">Login</a>
        </div>
        <button onclick="goBack()" class="back-btn">← Back</button>

        <script>
            function goBack() {
                history.back();
            }
        </script>
    </header>