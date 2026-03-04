<?php
include 'auth.php';

$msg = '';
if(isset($_GET['msg'])){
    if($_GET['msg'] == 'added') $msg = "✅ Member added successfully!";
    if($_GET['msg'] == 'deleted') $msg = "❌ Member deleted successfully!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Members</title>
<link rel="stylesheet" href="css/style.css">
<style>
.toast {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    background: #d4edda;
    color: #155724;
    padding: 12px 20px;
    border-radius: 6px;
    box-shadow: 0 0 10px rgba(0,0,0,0.5);
    opacity: 0;
    transition: opacity 0.5s ease, transform 0.5s ease;
    z-index: 9999;
}
.toast.show { opacity: 1; transform: translateX(-50%) translateY(0); }
</style>
</head>
<body>

<h2>Members</h2>

<table border="1">
    <thead>
        <tr>
            <th>Member Name</th>
            <th>Subscribed Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM members";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>{$row['member_name']}</td>";
            echo "<td>{$row['subscribed_date']}</td>";
            echo "<td><a href='remove_members.php?id={$row['id']}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<br>
<a href="add_members.php" class="submit">Add Member</a>
<a href="dashboard.php" class="logout-btn">Back to Dashboard</a>

<?php if($msg): ?>
<div id="toast" class="toast"><?php echo $msg; ?></div>
<script>
    const toast = document.getElementById('toast');
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 3000);
</script>
<?php endif; ?>

</body>
</html>