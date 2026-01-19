<?php

function getConnection(){
    $conn = mysqli_connect("localhost", "root", "", "webtech");
    if(!$conn){
        die("Database connection failed");
    }
    return $conn;
}

function usernameExists($username){
    $conn = getConnection();
    $stmt = mysqli_prepare($conn,
        "SELECT id FROM users WHERE username=?"
    );
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    return mysqli_stmt_num_rows($stmt) > 0;
}

function registerUser($name, $username, $password, $role="student"){
    $conn = getConnection();

    if(usernameExists($username)){
        return "duplicate";
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare($conn,
        "INSERT INTO users (name, username, password, role)
         VALUES (?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt, "ssss",
        $name, $username, $password, $role
    );

    return mysqli_stmt_execute($stmt);
}


function checkLogin($username, $password, $role)
{
    $conn = getConnection();

    $sql = "SELECT * FROM users WHERE username='$username' AND role='$role'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) !== 1) {
        return ["status" => false, "error" => "User not found"];
    }

    $user = mysqli_fetch_assoc($result);

    if (!password_verify($password, $user['password'])) {
        return ["status" => false, "error" => "Invalid password"];
    }

    return ["status" => true, "user" => $user];
}
