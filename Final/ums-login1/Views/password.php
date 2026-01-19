<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="CSS/style.css"">
</head>
<body>

<div class="box">
    <h2>Change Password</h2>

    <?php if (!empty($message)) { ?>
        <p style="color:red;"><?php echo $message; ?></p>
    <?php } ?>

    <form method="post" action="../Controller/ProfileController.php">
        <input type="password" name="old_password" placeholder="Old Password" required>
        <input type="password" name="new_password" placeholder="New Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>

        <button type="submit" name="change">Change</button>
    </form>

    <a href="dashboard.php">Back</a>
</div>

</body>
</html>
