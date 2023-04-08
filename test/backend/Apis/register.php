<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if (empty($username) || empty($password) || empty($email)) {
        echo "All fields are required";
        exit();
    }

    $db = new Database();
    $conn = $db->getDb();

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Email already exists";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            echo "User registered successfully";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
