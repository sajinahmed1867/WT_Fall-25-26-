<?php
$error="";
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Views/CSS/style.css">
<title>Login</title>
</head>
<body>

<div class="box">
<h2> University Management System</h2>

<?php
if ($error != "") {
    echo "<p style='color:red'>$error</p>";
}
?>

<form action="Controller/mainController.php" method="post" >
 <p>Login</p>
<select name="role" required>
    <option value="">Select Role</option>
    <option value="Student">Student</option>
    <option value="Faculty">Faculty</option>
</select>

<input type="text" name="username" placeholder="username" required>

<input type="password" name="password" placeholder="password" required>

<button type="submit" name="login">Login</button>
</form>

<span>New User ? </span> <a href="Views/register.php">Registers</a></p>
</div>

</body>
</html>
