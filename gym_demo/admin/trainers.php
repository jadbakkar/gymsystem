<?php
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Trainers</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>All Trainers</h2>

<?php
if (isset($_GET['msg'])) {
    $msgType = ($_GET['msg'] === 'deleted') ? 'delt' : 'success';
    $msgText = '';
    if ($_GET['msg'] === 'added') $msgText = 'Trainer added successfully!';
    if ($_GET['msg'] === 'updated') $msgText = 'Trainer updated successfully!';
    if ($_GET['msg'] === 'deleted') $msgText = 'Trainer deleted successfully!';
    echo "<div id='flash-msg' class='$msgType'>$msgText</div>";
}
?>

<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Years of Experience</th>
            <th>Program</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM trainers";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['years of experience']}</td>";
            echo "<td>{$row['program']}</td>";
            echo "<td><a href='edit_trainer.php?id={$row['id']}'>Edit</a></td>";
            echo "<td><a href='remove_trainer.php?id={$row['id']}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<br>
<a href="add_trainer.php" class="submit">Add Trainer</a><br>
<a href="dashboard.php" class="logout-btn">Back to Dashboard</a>

<script>
setTimeout(() => {
    const msg = document.getElementById('flash-msg');
    if (msg) {
        msg.classList.add('hide');
        setTimeout(() => msg.remove(), 500);
    }
}, 3000);
</script>
</body>
</html>