<?php
session_start();
include('../connection/config.php');

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['id'];
    $full_name = $_POST['full_name'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $place_of_birth = $_POST['place_of_birth'];
    $nationality = $_POST['nationality'];
    $elementary_school = $_POST['elementary_school'];
    $senior_high_school = $_POST['senior_high_school'];
    $college = $_POST['college'];
    $oral_communication = $_POST['oral_communication'];
    $general_math = $_POST['general_math'];
    $statistics_probability = $_POST['statistics_probability'];
    $earth_life_science = $_POST['earth_life_science'];
    $course = $_POST['course'];

    $average_grade = ($oral_communication + $general_math + $statistics_probability + $earth_life_science) / 4;
    $course_requirements = [
        'BS in Information Systems' => 85,
        'BS in Information Technology' => 89,
        'BS in Computer Science' => 90,
        'BS in Computer Engineering' => 92
    ];

    if ($average_grade >= $course_requirements[$course]) {
        $stmt = $conn->prepare("INSERT INTO enrollments (user_id, full_name, dob, age, place_of_birth, nationality, elementary_school, senior_high_school, college, oral_communication, general_math, statistics_probability, earth_life_science, course) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ississssiiiiis", $user_id, $full_name, $dob, $age, $place_of_birth, $nationality, $elementary_school, $senior_high_school, $college, $oral_communication, $general_math, $statistics_probability, $earth_life_science, $course);

        if ($stmt->execute()) {
            $message = "Congratulations! You have been enrolled in " . $course . "!";
        } else {
            $message = "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $message = "Your General Average didn't meet the general average requirement of your preferred course (" . $course .")";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enroll</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/enroll.css">
</head>
<body>
<header>
    <div class="top-container">
        <img src="../assets/images/CCST-Dept.png" alt="College Logo" class="logo">
        <h1>| Enrollment Form | College Enrollment Management System</h1>
    </div>
    </header>
    <nav>
        <a href="../index.php">Home</a>
        <a href="login.php">Login</a>
        <a href="signup.php">Sign Up</a>
        <a href="logout.php">Log Out</a>
        <a href="about-us.php">About Us</a>
    </nav>
    <div class="container">
        <form method="post">
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="date" name="dob" placeholder="Date of Birth" required>
            <input type="number" name="age" placeholder="Age" required>
            <input type="text" name="place_of_birth" placeholder="Place of Birth" required>
            <input type="text" name="nationality" placeholder="Nationality" required>
            <input type="text" name="elementary_school" placeholder="Elementary School" required>
            <input type="text" name="senior_high_school" placeholder="Senior High School" required>
            <input type="text" name="college" placeholder="College">
            <input type="number" name="oral_communication" placeholder="Oral Communication Grade" required>
            <input type="number" name="general_math" placeholder="General Math Grade" required>
            <input type="number" name="statistics_probability" placeholder="Statistics and Probability Grade" required>
            <input type="number" name="earth_life_science" placeholder="Earth and Life Science Grade" required>
            <select name="course" required>
                <option value="BS in Information Systems">BS in Information Systems</option>
                <option value="BS in Information Technology">BS in Information Technology</option>
                <option value="BS in Computer Science">BS in Computer Science</option>
                <option value="BS in Computer Engineering">BS in Computer Engineering</option>
            </select>
            <button type="submit">Enroll</button>
        </form>
        <?php if (isset($message)): ?>
            <p style="color: white;"><?php echo $message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
