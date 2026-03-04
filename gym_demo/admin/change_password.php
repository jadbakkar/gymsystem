<?php

    include 'auth.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

        $username = $_SESSION['username'];

        $query = "UPDATE admins SET password='$new_password' WHERE username='$username'";
        mysqli_query($conn, $query);

        header("Location: login.php?msg=password_updated");
        exit();
    }
?>
<link rel="stylesheet" href="css/style.css">
<form method="post">
    <input type="password" name="new_password" placeholder="New Password" required>
    <button type="submit">Update Password</button>
</form>
