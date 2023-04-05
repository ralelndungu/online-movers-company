<?php
// start a session to store the authentication status
session_start();

// check if the user is authenticated
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    // if the user is not authenticated, redirect to the home page
    header('Location: home.html');
    exit;
}

// if the user is authenticated, continue processing the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // process the form data here
    $name = $_POST['name'];
    $email = $_POST['email'];
    $service = $_POST['service'];
    $details = $_POST['details'];
    $payments = $_POST['payments'];
    
    // insert the form data into the database
    $host = "localhost"; // replace with your MySQL server hostname
    $name = "name"; // replace with your MySQL username
    $password = "password"; // replace with your MySQL password
    $dbname = "test"; // replace with your MySQL database name
    
    $conn = mysqli_connect($host, $username, $password, $dbname);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "INSERT INTO service_request (Name, Email, Service, Details, payments)
            VALUES ('$name', '$email', '$service', '$details', '$payments')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Service request submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>
