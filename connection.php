<?php
// Database configuration
$dbServer = 'localhost'; // Change this to your database server
$dbUsername = 'root';    // Change this to your database username
$dbPassword = 'root';    // Change this to your database password
$dbName = 'e_commerce'; // Change this to your database name

// Create a database connection
$conn = new mysqli($dbServer, $dbUsername, $dbPassword, $dbName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
