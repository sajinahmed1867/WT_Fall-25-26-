<?php
session_start();
require_once('../Model/ProfileModel.php');

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['user'];

$model = new ProfileModel();
$profile = $model->getProfile($username);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="CSS/style.css">
<title>Profile</title>
</head>
<body>

<div class="box">
<h2>My Profile</h2>

<?php
if(isset($_GET['success'])){
    echo "<p style='color:green'>Profile Updated</p>";
}
if(isset($_GET['deleted'])){
    echo "<p style='color:red'>Profile Deleted</p>";
}
?>

<form method="post" action="../Controller/ProfileController.php">

<input value="<?php echo $username; ?>" readonly>

<input type="text" name="name" placeholder="Name"
value="<?php echo $profile['name'] ?? ''; ?>" required>

<input type="text" name="student_id" placeholder="ID"
value="<?php echo $profile['student_id'] ?? ''; ?>" required>

<input type="text" name="department" placeholder="Department"
value="<?php echo $profile['department'] ?? ''; ?>" required>

<input type="email" name="email" placeholder="Email"
value="<?php echo $profile['email'] ?? ''; ?>" required>

<input type="text" name="phone" placeholder="Phone"
value="<?php echo $profile['phone'] ?? ''; ?>" required>

<input type="text" name="year" placeholder="Year"
value="<?php echo $profile['year'] ?? ''; ?>" required>

<button type="submit" name="update">Update</button>
<button type="submit" name="delete"
onclick="return confirm('Are you sure?')">Delete</button>

</form>

<a href="dashboard.php">Back</a>
</div>

</body>
</html>
