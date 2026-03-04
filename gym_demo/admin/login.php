<?php
session_start();
include 'db.php';

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
    <form action="login.php" method="post">
        <label for="username" >Username:</label>
        <input type="text" id="username" name="username" placeholder="username" required tabindex="1">
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="password"  required>
        <br>
        <input type="submit" value="Login"><br><br>
        <input type="submit" name="change_password" value="Change Password">
    </form>
</body>
</html>
<?php
    

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['change_password'])) {
        header("Location: change_password.php");
        exit();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    //query the database for this username
    $query = "SELECT * FROM admins WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        
        //user exists,check password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])){
            $_SESSION['username'] = $username;
            header("location: dashboard.php");
            exit();
        }else {
            echo "wrong username or password";
        }
    }else{
        echo"wrong username or password";
    }
}
if (isset($_GET['msg']) && $_GET['msg'] == 'password_updated') {
    echo "<div id='flash-msg' class='upd'>Password updated successfully!</div>";
}

?>
<script>
    setTimeout(() => {
        const msg = document.getElementById('flash-msg');
        if (msg) {
            msg.classList.add('hide');
        
        setTimeout(() => msg.remove(), 500);
    }
},3000);
</script>
<style>.upd {
    background: #d4edda;
    color: #155724;
    padding: 10px;
    border-radius: 6px;
    margin: 10px 0;

    opacity: 1;
    transition: opacity 0.5s ease;
}

.upd.hide {
    opacity: 0;
}
</style>