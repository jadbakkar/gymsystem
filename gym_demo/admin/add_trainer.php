<?php
include 'auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $years = $_POST['years_of_experience'];
    $program = trim($_POST['program']);

    if(!empty($name) && !empty($years) && !empty($program)) {
        $sql = "INSERT INTO trainers (name, `years of experience`, program)
                VALUES ('$name', $years, '$program')";
        mysqli_query($conn, $sql);

        header("Location: trainers.php?msg=added");
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
<title>Add Trainer</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Add Trainer</h2>

<?php if(isset($error_msg)) echo "<p style='color:red;'>$error_msg</p>"; ?>

<form method="POST">
    <input type="text" name="name" placeholder="Trainer Name" required><br><br>
    <input type="number" name="years_of_experience" placeholder="Years of Experience" required><br><br>
    <input type="text" name="program" placeholder="Program" required><br><br>
    <input type="submit" value="Add Trainer" class="submit">
</form>

<br>
<a href="trainers.php" class="logout-btn">Back to Trainers</a>
</body>
</html>