<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/about-us.css">
</head>
<body>
    <header>
    <div class="top-container">
        <img src="../assets/images/CCST-Dept.png" alt="College Logo" class="logo">
        <h1>| About Us | College Enrollment Management System</h1>
    </div>
    </header>
    <nav>
        <a href="../index.php">Home</a>
        <?php if (isset($_SESSION['loggedin'])): ?>
            <a href="enroll.php">Enroll</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="signup.php">Sign Up</a>
        <?php endif; ?>
    </nav>
    <div class="content1">
            <h2>About Us</h2>
                <h3>Welcome to QAMSim! your trusted partner in building innovative Quality Assurance Management Systems. We are a dedicated team of students passionate about delivering solutions that enhanse your quality assurance processes.</h3>
            <ul>
                <h3>Our Team</h3>
                <li><h4>Arjay Capina - Software Tester</h4>
                    The one who ensures that every product we deliver is of the highest quality, meticulously testing every feature to guarantee flawless performance and reliability.</li>
                    <li><h4>Sebastian Galang - Software Developer/Programmer</h4>
                        The creative force behind our software development, crafting robust and efficient code to bring our innovative ideas to life.</li>
                        <li><h4>Maryrose Kate Garchia - Technical Writer</h4>
                            The one who articulates our complex systems into clear, concise documentation, making sure our clients and team members are always on the same page.</li>
                        <li><h4>Zeagle Jamdrei Sanchez - Programmer</h4>
                            The one who brings expertise and precision to our programming team, developing and refining code to ensure our systems run smoothly and efficiently.</li>
                    <li><h4>Jerico Sarabia - Project Manager</h4>
                        The one who leads our projects with a strategic vision and meticulous planning, ensuring timely delivery and seamless integration of our solutions.</li>
                <li><h4>John Lei Talambayan - System Analyst</h4>
                    The one who analyzes and designs system requirements to optimize functionality and performance, ensuring our solutions meet and exceed client expectations.</li>
        </ul>
    </div>
    <div class="content2">
            <h3>Our Focus</h3>
            <p>At QAMSim, we specialize in developing Quality Assurance Management Systems that are tailored to meet the unique needs of our clients. Our goal is to provide reliable, user-friendly, and efficient solutions that enhance the quality and efficiency of your operations. Through collaboration, innovation, and a commitment to excellence, we at QAMSim are dedicated to helping your business achieve the highest standards of quality and performance.</p>
    </div>
</body>
</html>
