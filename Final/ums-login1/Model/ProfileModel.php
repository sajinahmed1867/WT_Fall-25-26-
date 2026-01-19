<?php
require_once('db.php');

class ProfileModel {

    public function getProfile($username) {
        $conn = getConnection();
        $sql = "SELECT * FROM profiles WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function saveProfile($username, $name, $sid, $dept, $email, $phone, $year) {
        $conn = getConnection();

        $check = $conn->prepare("SELECT username FROM profiles WHERE username=?");
        $check->bind_param("s", $username);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            $sql = "UPDATE profiles SET 
                    name=?, student_id=?, department=?, email=?, phone=?, year=? 
                    WHERE username=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $name, $sid, $dept, $email, $phone, $year, $username);
        } else {
            $sql = "INSERT INTO profiles 
                    (username, name, student_id, department, email, phone, year) 
                    VALUES (?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $username, $name, $sid, $dept, $email, $phone, $year);
        }

        return $stmt->execute();
    }

    public function deleteProfile($username) {
        $conn = getConnection();
        $sql = "DELETE FROM profiles WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        return $stmt->execute();
    }

    public function getUserByUsername($username) {
        $conn = getConnection();
        $sql = "SELECT * FROM users WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updatePassword($username, $newPassword) {
        $conn = getConnection();
        $hash = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password=? WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hash, $username);
        return $stmt->execute();
    }
}
