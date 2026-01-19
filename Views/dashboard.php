<?php
session_start();
if(!isset($_SESSION['user'])) header("Location: index.php");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css">
<title>Dashboard</title>
</head>
<body>

<div class="box">

<?php if($_SESSION['role']=="Student"){ ?>

<h2>Student Dashboard</h2>
<p>Welcome, <?php echo $_SESSION['user']; ?></p>

<ul>
    <li><a href="view-course&marks.php">View Courses & Marks</a></li>
    <li><a href="register-course.php">Register New Course</a></li>
    <li><a href="contact-faculty.php">Contact with Faculty</a></li>
    <li><a href="notice.php">Notices</a></li>
    <li><a href="routine.php">Class Routine</a></li>
    <li><a href="profile.php">Profile</a></li>
    <li><a href="password.php">Change Password</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>

<?php } else { ?>

<p>Welcome, <?php echo $_SESSION['user']; ?></p>

<ul>
    <li><a href="profile.php">Profile</a></li>
    <li><a href="password.php">Change Password</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>

<?php } ?> 

</div>
</body>
</html>
