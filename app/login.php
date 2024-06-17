<?php
session_start();
include('../connection/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $id;
        header('Location: enroll.php');
    } else {
        $error = "Invalid username or password";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
<header>
    <div class="top-container">
        <img src="../assets/images/CCST-Dept.png" alt="College Logo" class="logo">
        <h1>| Login | College Enrollment Management System</h1>
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
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <p style="color: white;">Don't have an account? <a href="signup.php">Sign up here</a></p>
    </div>
</body>
</html>
