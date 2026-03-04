<?php
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Welcome: <?php echo $_SESSION["username"]; ?></h1>
    <div class="links">
    <a href="trainers.php" > trainers</a><br>
    <a href="add_trainer.php">add trainer</a><br>
    <a href="messages.php">new messages</a><br>
    <a href="members.php">view members</a><br>
    <a href="add_members.php">add member</a><br>
    <a href="../public/index.php">view website</a><br></div>
    <a href="logout.php" class="logout-btn">Logout</a>
<div id="toast" class="toast"></div>
</body>
</html>
