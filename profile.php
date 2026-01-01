<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Profile</title>
</head>
<body>

<div class="box">
<h2>My Profile</h2>

<input value="<?php echo $_SESSION['user']; ?>">
<input value="sajin.1867@email.com">
<input value="CSE">

<button onclick="alert('Profile Updated ')">Update</button>
<button onclick="alert('Profile Deleted ')">Delete</button>

<a href="dashboard.php">Back</a>
</div>

</body>
</html>
