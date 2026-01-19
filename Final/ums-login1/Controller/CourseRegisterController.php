<?php
session_start();
require_once "../Model/CourseRegisterModel.php";


if (!isset($_SESSION['student_id'])) {
    header("Location: ../Views/index.php");
    exit;
}

$msg = "";


$currentCourse = CourseRegisterModel::getCourse($_SESSION['student_id']);


if (isset($_POST['register']) && !empty($_POST['course'])) {
    CourseRegisterModel::registerCourse(
        $_SESSION['student_id'],
        $_POST['course']
    );
    $msg = "Course Registered Successfully!";
}


if (isset($_POST['drop'])) {

    
    if (!empty($_POST['course'])) {
        $courseToDrop = $_POST['course'];
    }
    
    else {
        if ($currentCourse && mysqli_num_rows($currentCourse) > 0) {
            $row = mysqli_fetch_assoc($currentCourse);
            $courseToDrop = $row['course_name'];
        } else {
            $courseToDrop = null;
        }
    }

    if ($courseToDrop) {
        CourseRegisterModel::dropCourse(
            $_SESSION['student_id'],
            $courseToDrop
        );
        $msg = "Course Dropped Successfully!";
    }
}


$currentCourse = CourseRegisterModel::getCourse($_SESSION['student_id']);
