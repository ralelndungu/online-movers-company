<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
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
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                echo "User logged in successfully";
            } else {
                echo "Incorrect password";
            }
        } else {
            echo "Email not found";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
