<?php
session_start();


if (!isset($_SESSION['routine'])) {
    $_SESSION['routine'] = [
        ["day" => "Sunday",    "course" => "Web Technology"],
        ["day" => "Tuesday",   "course" => "Database Systems"],
        ["day" => "Thursday",  "course" => "Java"],
        ["day" => "Monday",    "course" => "Machine Learning"],
        ["day" => "Saturday",  "course" => "Operating System"],
        ["day" => "Wednesday", "course" => "English"]
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="CSS/style.css">
    <title>Class Routine</title>
</head>
<body>

<div class="box">
    <h2>Class Routine</h2>

    <table border="1" width="100%">
        <tr>
            <th>Day</th>
            <th>Course</th>
        </tr>

        <?php
        foreach ($_SESSION['routine'] as $row) {
            echo "<tr>";
            echo "<td>{$row['day']}</td>";
            echo "<td>{$row['course']}</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <br>
    <a href="dashboard.php">Back</a>
</div>

</body>
</html>
