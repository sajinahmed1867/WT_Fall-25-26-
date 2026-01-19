<?php
session_start();
require_once __DIR__ . '/../Model/db.php';

$error = "";
 
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $role     = $_POST['role'];

    // echo "$username";
    // echo "$role";
    // echo "$password";
     $result = checkLogin($username, $password, $role);

    // echo $result['status'];
     //echo $result['error'];
     //echo $result['user'];


    if ($result['status'] === false) {
        $error = $result['error'];
        echo "$error";
    } else {

        $user = $result['user'];

        $_SESSION['student_id'] = $user['id'];
        $_SESSION['user']       = $user['username'];
        $_SESSION['role']       = $user['role'];
       // echo "success";

          header("Location: ../Views/dashboard.php");
          exit();

    }
}
else{
require_once __DIR__ . '/../Views/index.php';
}