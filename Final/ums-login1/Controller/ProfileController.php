<?php
session_start();
require_once('../Model/ProfileModel.php');


if (!isset($_SESSION['user'])) {
    header("Location: ../Views/index.php");
    exit();
}

$username = $_SESSION['user'];
$model = new ProfileModel();


if (isset($_POST['update'])) {

    $model->saveProfile(
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

    $model->deleteProfile($username);

    session_unset();
    session_destroy();

    header("Location:../start.php");
    exit();
}


if (isset($_POST['change'])) {

    $oldPass     = $_POST['old_password'];
    $newPass     = $_POST['new_password'];
    $confirmPass = $_POST['confirm_password'];

    $user = $model->getUserByUsername($username);

    if (!password_verify($oldPass, $user['password'])) {
        header("Location: ../Views/password.php?error=old");
        exit();
    }

    if ($newPass !== $confirmPass) {
        header("Location: ../Views/password.php?error=match");
        exit();
    }

    $model->updatePassword($username, $newPass);

    header("Location: ../Views/password.php?success=1");
    exit();
}
