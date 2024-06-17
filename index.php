<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>College Enrollment - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/homepage.css">
</head>
<body>
    <header>
    <div class="top-container">
        <img src="assets/images/CCST-Dept.png" alt="College Logo" class="logo">
        <h1>College Enrollment Management System</h1>
    </div>
    </header>
    <nav>
            <a href="index.php">Home</a>
        <?php if (isset($_SESSION['loggedin'])): ?>
            <a href="app/enroll.php">Enroll</a>
            <a href="app/logout.php">Logout</a>
        <?php else: ?>
            <a href="app/login.php">Login</a>
            <a href="app/signup.php">Sign Up</a>
        <?php endif; ?>
        <a href="app/about-us.php">About Us</a>
    </nav>
    <div class="content-container">
    <div class="content1">
            <h2>Top Achievements</h2>
            <ul>
                <li>Accredited by the National Educational Association</li>
                <li>Ranked among the top 10 colleges in the region</li>
                <li>High employment rate for graduates</li>
            </ul>
    </div>
    <div class="content2">
            <h2>Offered Courses</h2>
            <ul>
                <li>Bachelor of Science in Information Systems</li>
                <li>Bachelor of Science in Information Technology</li>
                <li>Bachelor of Science in Computer Science</li>
                <li>Bachelor of Science in Computer Engineering</li>
            </ul>
    </div><br>
    <div class="content3">
            <h2>Mission</h2>
            <p>To strengthen and synergize instruction, research and extension, administration and student development creating a learning community that ensures the generation of God-loving and holistic graduates prepared for civic engagement and academic and life success.</p>
    </div>
    <div class="content4">
            <h2>Vision</h2>
            <p>The school is a Center of Excellence upholding glocally-responsive education dedicated to transform lives and empower communities.</p>
    </div>
    <div class="content5">
            <h2>Philosophy</h2>
            <p>The school is deeply committed towards the integral formation of the human person, with a profound faith in God, in his fellow men and himself by providing its students the full development of their physical, intellectual, social and cultural endowment for effective participation in various professions and industrial occupations and to enable them to enjoy reasonable quality of life to be able to contribute to the upliftment of the human society.</p>
    </div>
</div>
</body>
</html>