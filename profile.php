<?php
session_start();
include("includes/header.php");
include("includes/db.php");

/* LOGIN CHECK */

if (!isset($_SESSION['user'])) {
    echo "Please login first";
    exit();
}

$user = $_SESSION['user'];

/* PHOTO UPLOAD */

if (isset($_POST['upload'])) {

    $filename = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];

    if ($filename != "") {

        $folder = "uploads/" . $filename;

        move_uploaded_file($tmp, $folder);

        mysqli_query($conn, "UPDATE users SET photo='$filename' WHERE email='$user'");
    }
}

/* GET USER DATA */

$q = "SELECT * FROM users WHERE email='$user'";
$r = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($r);

?>

<h2>My Profile</h2>

<div class="profile-box">

    <!-- PROFILE PHOTO -->

    <form method="POST" enctype="multipart/form-data">

        <div class="profile-pic">

            <?php if (!empty($row['photo'])) { ?>

                <img src="uploads/<?php echo $row['photo']; ?>">

            <?php } else { ?>

                <img src="images/default-user.png">

            <?php } ?>

            <label for="photo">+</label>

            <input type="file" name="photo" id="photo" onchange="this.form.submit()">

            <input type="hidden" name="upload">

        </div>

    </form>


    <!-- USER DETAILS -->

    <p><b>Name:</b>
        <?php echo $row['name']; ?>
    </p>

    <p><b>Email:</b>
        <?php echo $row['email']; ?>
    </p>

    <p><b>Phone:</b>
        <?php echo $row['phone']; ?>
    </p>

    <p><b>Address:</b>
        <?php echo $row['address']; ?>
    </p>


    <!-- LOGOUT BUTTON -->

    <br>

    <a href="logout.php" class="logout-btn">Logout</a>

</div>

<?php include("includes/footer.php"); ?>