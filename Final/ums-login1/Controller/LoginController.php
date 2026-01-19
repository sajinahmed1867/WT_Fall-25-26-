<?php
session_start();
require_once "../Model/db.php";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = getConnection();

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {

            
            $_SESSION['student_id'] = $row['id'];
            $_SESSION['username']   = $row['username'];
            $_SESSION['role']       = $row['role'];

            header("Location: ../Views/dashboard.php");
            exit();
        }
    }

    header("Location: ../Views/index.php?error=invalid");
    exit();
}
