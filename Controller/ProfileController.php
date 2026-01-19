<?php
session_start();
require_once('../Model/ProfileModel.php');

// Safety check
if (!isset($_SESSION['user'])) {
    header("Location: ../Views/index.php");
    exit();
}

$username = $_SESSION['user'];

if (isset($_POST['update'])) {

    saveProfile(
        $username,
        $_POST['name'],
        $_POST['student_id'],
        $_POST['department'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['year']
    );

    header("Location: ../Views/profile.php?success=1");
    exit();
}

if (isset($_POST['delete'])) {

    deleteProfile($username);

    // destroy session AFTER delete
    session_unset();
    session_destroy();

    // redirect to login page, NOT profile
    header("Location: ../Views/index.php?deleted=1");
    exit();
}
