<?php
session_start();
if(isset($_POST['login'])){
    $_SESSION['role'] = $_POST['role'];
    $_SESSION['user'] = $_POST['username'];
    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Login</title>
</head>
<body>

<div class="box">
<h2>AIUB University Management System</h2>

<form method="post">
<select name="role" required>
<option value="">Select User</option>
<option>Student</option>
<option>Faculty</option>
</select>

<input type="text" name="username" placeholder="Username" required>
<input type="password" placeholder="Password" required>

<button name="login">Login</button>
</form>

<p><a href="register.php">New User? Register</a></p>
</div>

</body>
</html>
