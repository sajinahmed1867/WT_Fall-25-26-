<?php
require_once('../Model/db.php');

if(isset($_POST['register'])){

    $name     = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role     = $_POST['role'];

    $result = registerUser($name, $username, $password, $role);

    if($result === "duplicate"){
        header("Location: ../Views/register.php?error=duplicate");
        exit();
    }
    else if($result){
        header("Location: ../Views/register.php?success=1");
        exit();
    }
    else{
        header("Location: ../Views/register.php?error=failed");
        exit();
    }
}
