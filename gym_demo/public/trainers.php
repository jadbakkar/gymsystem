<?php 
include 'includes/header.php'; 
include '../admin/db.php'; 
?>
<div class="trainers-page">
    <h1>Our Trainers</h1>
    <div class="trainers-container">
        <?php
        $sql = "SELECT * FROM trainers ORDER BY id DESC"; 
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<div class='trainer-card'>";
                echo "<h2>".htmlspecialchars($row['name'])."</h2>";
                echo "<p><strong>Years of experience:</strong> ".htmlspecialchars($row['years of experience'])."</p>";
                echo "<p><strong>Program:</strong> ".htmlspecialchars($row['program'])."</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No trainers available at the moment.</p>";
        }
        ?>
    </div>
</div>
<script src="assets/script.js"></script>