<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="CSS/style.css">
    <title>User Registration</title>
</head>
<body>

<div class="box">
    <h2>Users Registration</h2>

    <?php
    if (isset($_GET['success'])) {
        echo "<p style='color:green'>Registration Successful</p>";
    }

    if (isset($_GET['error']) && $_GET['error'] === 'duplicate') {
        echo "<p style='color:red'>Username already exists</p>";
    }

    if (isset($_GET['error']) && $_GET['error'] === 'failed') {
        echo "<p style='color:red'>Registration failed</p>";
    }
    ?>

    <form method="post" action="../Controller/RegisterController.php">

        <input type="text" name="name" placeholder="Name" required>

        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <select name="role" required>
            <option value="">-- Select Role --</option>
            <option value="Student">Student</option>
            <option value="Faculty">Faculty</option>
        </select>

        <button type="submit" name="register">Register</button>
    </form>

<a href="../start.php?page=login">Back</a>

</div>

</body>
</html>
