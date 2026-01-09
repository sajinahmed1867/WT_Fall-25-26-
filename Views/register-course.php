<?php
session_start();

if (isset($_POST['register'])) {
    $_SESSION['course'] = $_POST['course'];
    $msg = "Course Registered Successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css">
    <title>Register Course</title>
</head>
<body>

<div class="box">
    <h2>Register New Course</h2>

    <?php
    if (isset($msg)) {
        echo "<p style='color: green;'>$msg</p>";
    }
    ?>

    <form method="post">
        <select name="course" required>
            <option value="">-- Select Course --</option>
            <option>Artificial Intelligence</option>
            <option>Machine Learning</option>
            <option>Computer Networks</option>
            <option>Math Mathematics</option>
            <option>English</option>
            <option>Bangladesh Studies</option>
        </select>

        <br><br>

        <button type="submit" name="register">
            Register
        </button>
    </form>

    <br>
    <a href="dashboard.php">Back</a>
</div>

</body>
</html>
