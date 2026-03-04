<?php 
include 'includes/header.php'; 
include '../admin/db.php'; 

$success = false;
$error = false;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if(!empty($name) && !empty($email) && !empty($message)){
        $stmt = $conn->prepare("INSERT INTO messages (name,email,message,created_at) VALUES (?,?,?,NOW())");
        $stmt->bind_param("sss",$name,$email,$message);

        if($stmt->execute()) $success = true;
        else $error = "Failed to send message. Please try again.";
        $stmt->close();
    } else $error = "All fields are required!";
}
?>

<div class="contact-page">
    <h1>Contact Us</h1>

    <?php if($success): ?>
        <p style="color:green;">Your message has been sent successfully!</p>
    <?php elseif($error): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Message:</label>
        <textarea name="message" rows="5" required></textarea>

        <button type="submit">Send Message</button>
    </form>
</div>
<script src="assets/js/script.js"></script>
</main>
</body>
</html>

