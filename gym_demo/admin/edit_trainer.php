<?php
include 'auth.php';

if (!isset($_GET['id'])) {
    header("Location: trainers.php");
    exit();
}

$id = $_GET['id'];

// Handle form submission
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $years = $_POST['years_of_experience'];
    $program = $_POST['program'];

    $sql = "UPDATE trainers SET name='$name', `years of experience`=$years, program='$program' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        header("Location: trainers.php?msg=updated");
        exit();
    } else {
        echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
    }
}

// Fetch trainer data
$sql = "SELECT * FROM trainers WHERE id=$id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) !== 1) {
    echo "<p style='color:red;'>Trainer not found!</p>";
    exit();
}
$trainer = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Trainer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Edit Trainer</h2>

<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?php echo $trainer['name']; ?>" required><br><br>

    <label>Years of Experience:</label><br>
    <input type="number" name="years_of_experience" value="<?php echo $trainer['years of experience']; ?>" required><br><br>

    <label>Program:</label><br>
    <input type="text" name="program" value="<?php echo $trainer['program']; ?>" required><br><br>

    <input type="submit" name="update" value="Update Trainer">
</form>

<br>
<a href="trainers.php" class="submit">Back to Trainers</a>
<a href="dashboard.php" class="logout-btn">Back to Dashboard</a>

</body>
</html>