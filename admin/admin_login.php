<?php
session_start();

if (isset($_POST['login'])) {

    if ($_POST['username'] == "admin" && $_POST['password'] == "admin123") {

        $_SESSION['admin'] = true;

        header("Location:dashboard.php");

    } else {

        echo "Wrong credentials";

    }

}
?>

<form method="POST">

    <input type="text" name="username" placeholder="Admin">

    <input type="password" name="password" placeholder="Password">

    <button name="login">Login</button>

</form>