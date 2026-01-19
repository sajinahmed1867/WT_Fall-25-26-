<?php
session_start();


if (!isset($_SESSION['notices'])) {
    $_SESSION['notices'] = [
        "Class test on Sunday",
        "Assignment submission next week",
        "Lab class postponed",
        "Today class cancelled",
        "Tomorrow lab exam (WebTech)",
        "Final project defence on 20/01/2026"
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="CSS/style.css">
    <title>Notice</title>
</head>
<body>

<div class="box">
    <h2>Notices</h2>

    <ul>
        <?php
        foreach ($_SESSION['notices'] as $notice) {
            echo "<li>$notice</li>";
        }
        ?>
    </ul>

    <a href="dashboard.php">Back</a>
</div>

</body>
</html>
