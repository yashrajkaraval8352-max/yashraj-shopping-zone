<?php
session_start();
include("includes/db.php");

$error = "";

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);

        $_SESSION['user'] = $row['id'];

        header("Location: index.php");
        exit();

    } else {

        $error = "Invalid Email or Password";

    }

}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Login</title>

    <!-- CSS LINK -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <h2>Login</h2>

    <?php
    if ($error != "") {
        echo "<p style='color:red;text-align:center;'>$error</p>";
    }
    ?>

    <form method="POST">

        <input type="email" name="email" placeholder="Enter Email" required>

        <input type="password" name="password" placeholder="Enter Password" required>

        <button type="submit" name="login">
            Login
        </button>

    </form>

    <p style="text-align:center;">
        Don't have account ?
        <a href="register.php">Register</a>
    </p>

</body>

</html>