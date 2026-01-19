<?php
require_once "db.php";

class CourseRegisterModel {

    public static function registerCourse($student_id, $course) {
        $conn = getConnection();
        $stmt = mysqli_prepare($conn,
            "INSERT INTO student_courses (student_id, course_name)
             VALUES (?, ?)"
        );
        mysqli_stmt_bind_param($stmt, "is", $student_id, $course);
        return mysqli_stmt_execute($stmt);
    }

   public static function dropCourse($student_id, $course) {
    $conn = getConnection();
    $stmt = mysqli_prepare(
        $conn,
        "DELETE FROM student_courses
         WHERE student_id = ? AND course_name = ?"
    );
    mysqli_stmt_bind_param($stmt, "is", $student_id, $course);
    return mysqli_stmt_execute($stmt);
}


    public static function getCourse($student_id) {
        $conn = getConnection();
        return mysqli_query(
            $conn,
            "SELECT course_name FROM student_courses
             WHERE student_id='$student_id'"
        );
    }
}
