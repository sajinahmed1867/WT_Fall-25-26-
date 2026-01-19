<?php
require_once('db.php');

function getProfile($username){
    $conn = getConnection();
    $sql = "SELECT * FROM profiles WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function saveProfile($username, $name, $sid, $dept, $email, $phone, $year){
    $conn = getConnection();

    $check = mysqli_query($conn, "SELECT * FROM profiles WHERE username='$username'");

    if(mysqli_num_rows($check) > 0){
        
        $sql = "UPDATE profiles SET
                name='$name',
                student_id='$sid',
                department='$dept',
                email='$email',
                phone='$phone',
                year='$year'
                WHERE username='$username'";
    }else{
        
        $sql = "INSERT INTO profiles
                (username, name, student_id, department, email, phone, year)
                VALUES
                ('$username','$name','$sid','$dept','$email','$phone','$year')";
    }

    return mysqli_query($conn, $sql);
}

function deleteProfile($username){
    $conn = getConnection();
    $sql = "DELETE FROM profiles WHERE username='$username'";
    return mysqli_query($conn, $sql);
}
