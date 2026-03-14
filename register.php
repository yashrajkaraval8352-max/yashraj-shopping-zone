<?php
include("includes/header.php");
include("includes/db.php");

if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users(name,email,phone,address,password)
VALUES('$name','$email','$phone','$address','$password')");

    echo "Registration Successful";

}
?>

<form method="POST" class="register-form">

    <h2>User Registration</h2>

    <input type="text" name="name" placeholder="Name" required>

    <input type="email" name="email" placeholder="Email" required>

    <input type="text" name="phone" placeholder="Phone" required>

    <input type="text" name="address" placeholder="Address" required>

    <input type="password" name="password" placeholder="Password" required>

    <input type="password" name="confirm" placeholder="Confirm Password" required>

    <button name="register">Register</button>

    <p>Already have an account? <a href="login.php">Login</a></p>

</form>

<?php include("includes/footer.php"); ?>