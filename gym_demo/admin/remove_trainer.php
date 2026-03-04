<?php
include 'auth.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM trainers WHERE id=$id";
    mysqli_query($conn, $sql);

    header("Location: trainers.php?msg=deleted");
    exit();
} else {
    header("Location: trainers.php");
    exit();
}
?>