<?php
include 'auth.php'; // ensures admin is logged in and DB connection exists

// 1️⃣ Handle deletion if delete_id is passed in URL
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']); // cast to integer for safety
    $delete_sql = "DELETE FROM messages WHERE id = $delete_id";
    mysqli_query($conn, $delete_sql);

    // Redirect back to the same page to refresh table
    header("Location: messages.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>All Messages</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th> <!-- Delete button column -->
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM messages";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['message']}</td>";
                // Delete link
                echo "<td><a href='messages.php?delete_id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this message?')\">Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="dashboard.php">Back to Dashboard</a>
    <div id="toast" class="toast"></div>
</body>
</html>

