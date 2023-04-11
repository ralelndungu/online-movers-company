<?php
// Database connection parameters
$servername = "localhost";
$username = "online-movers";
$password = "Rakel1234";
$dbname = "online-movers";

// Create a new connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Successfully connected to the database";
}

?>
