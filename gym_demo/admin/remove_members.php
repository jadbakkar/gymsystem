<?php
include 'auth.php';

if (isset($_GET['id'])) {
    $member_id = $_GET['id'];
    $sql = "DELETE FROM members WHERE id = $member_id";
    mysqli_query($conn, $sql);

    // Redirect back to members.php with a message
    header("Location: members.php?msg=deleted");
    exit();
} else {
    header("Location: members.php");
    exit();
}
?>