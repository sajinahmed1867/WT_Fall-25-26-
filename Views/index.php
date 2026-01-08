<?php
session_start();
require_once('../Model/db.php');

$error = "";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $role     = $_POST['role'];

    $conn = getConnection();

    $sql = "SELECT * FROM users WHERE username='$username' AND role='$role'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        
        if (password_verify($password, $user['password'])) {

            $_SESSION['user'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            header("Location: dashboard.php");
            exit();

        } else {
            $error = "Invalid password";
        }

    } else {
        $error = "User not found";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css">
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

<form method="post">

<select name="role" required>
    <option value="">Select User</option>
    <option value="Student">Student</option>
    <option value="Faculty">Faculty</option>
</select>

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="login">Login</button>
</form>

<p><a href="register.php">New User? Registers</a></p>
</div>

</body>
</html>
