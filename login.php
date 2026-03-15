<?php
session_start();
include("includes/header.php");
include("includes/db.php");

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $q = "SELECT * FROM users WHERE email='$email'";
    $r = mysqli_query($conn, $q);

    $user = mysqli_fetch_assoc($r);

    if ($user) {

        if (password_verify($password, $user['password'])) {

            $_SESSION['user'] = $user['id'];

            header("Location:index.php");
            exit();

        } else {
            echo "<p style='text-align:center;color:red;'>Invalid Password</p>";
        }

    } else {
        echo "<p style='text-align:center;color:red;'>User not found</p>";
    }

}
?>

<form method="POST">

    <h2>User Login</h2>

    <input type="email" name="email" placeholder="Email" required>

    <input type="password" name="password" placeholder="Password" required>

    <button name="login">Login</button>

    <p style="text-align:center;margin-top:15px;">
        Don't have an account?
        <a href="register.php">Register</a>
    </p>

</form>

<?php include("includes/footer.php"); ?>