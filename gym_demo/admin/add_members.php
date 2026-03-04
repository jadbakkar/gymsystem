<?php
include 'auth.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $member_name = trim($_POST['member_name']);
    $subscribed_date = $_POST['subscription_date'];

    if(!empty($member_name) && !empty($subscribed_date)){
        $sql = "INSERT INTO members (member_name, subscribed_date)
                VALUES ('$member_name', '$subscribed_date')";
        mysqli_query($conn, $sql);

        // redirect to members.php with a message
        header("Location: members.php?msg=added");
        exit();
    } else {
        $error_msg = "All fields are required!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Member</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Add Member</h2>

<?php if(isset($error_msg)) echo "<p style='color:red;'>$error_msg</p>"; ?>

<form method="POST">
    <input type="text" name="member_name" placeholder="Member Name" required><br><br>
    <input type="date" name="subscription_date" required><br><br>
    <input type="submit" value="Add Member" class="submit">
</form>

<br>
<a href="members.php" class="logout-btn">Back to Members</a>

</body>
</html>