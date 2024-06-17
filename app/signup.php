<?php
include('../connection/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (full_name, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $full_name, $username, $password);

    if ($stmt->execute()) {
        header('Location: login.php');
    } else {
        $error = "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/signup.css">
</head>
<body>
<header>
    <div class="top-container">
        <img src="../assets/images/CCST-Dept.png" alt="College Logo" class="logo">
        <h1>| Sign Up | College Enrollment Management System</h1>
    </div>
    </header>   
    <nav>
        <a href="../index.php">Home</a>
        <a href="login.php">Login</a>
        <a href="signup.php">Sign Up</a>
        <a href="about-us.php">About Us</a>
    </nav>
    <div class="container">
        <form method="post">
            <input type="text" name="full_name" placeholder="Full Name (LN, FN, MI)" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Sign Up</button>
        </form>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
