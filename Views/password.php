<?php
session_start();


if (!isset($_SESSION['password'])) {
    $_SESSION['password'] = "12345"; 
}

$message = "";

if (isset($_POST['change'])) {

    $oldPass = $_POST['old_password'];
    $newPass = $_POST['new_password'];
    $confirmPass = $_POST['confirm_password'];

    if ($oldPass != $_SESSION['password']) {
        $message = "<p style='color:red;'>Old password is incorrect!</p>";
    }
    elseif ($newPass != $confirmPass) {
        $message = "<p style='color:red;'>New password and confirm password do not match!</p>";
    }
    else {
        $_SESSION['password'] = $newPass;
        $message = "<p style='color:green;'>Password changed successfully!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css">
    <title>Change Password</title>
</head>
<body>

<div class="box">
    <h2>Change Password</h2>

    <?php echo $message; ?>

    <form method="post">
        <input type="password" name="old_password" placeholder="Old Password" required>
        <input type="password" name="new_password" placeholder="New Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>

        <button type="submit" name="change">Change</button>
    </form>

    <br>
    <a href="dashboard.php">Back</a>
</div>

</body>
</html>
