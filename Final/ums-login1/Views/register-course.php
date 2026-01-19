<?php require_once "../Controller/CourseRegisterController.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Register / Drop Course</title>
    <link rel="stylesheet"href="CSS/style.css">
</head>
<body>

<div class="box">
    <h2>Register / Drop Course</h2>

    <?php if ($msg) echo "<p style='color:green'>$msg</p>"; ?>

    <?php if ($currentCourse->num_rows > 0): 
        $row = $currentCourse->fetch_assoc(); ?>
        <p><b>Current Course:</b> <?= $row['course_name']; ?></p>
    <?php else: ?>
        <p style="color:red;">No course registered</p>
    <?php endif; ?>

    <form method="post">
        <select name="course">
            <option value="">-- Select Course --</option>
            <option>Artificial Intelligence</option>
            <option>Machine Learning</option>
            <option>Computer Networks</option>
            <option>Math Mathematics</option>
            <option>English</option>
            <option>Bangladesh Studies</option>
        </select>
        <button name="register">Register</button>
    </form>

    <form method="post">
        <button name="drop">Drop Course</button>
    </form>

    <a href="dashboard.php">Back</a>
</div>

</body>
</html>
