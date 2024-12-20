<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "visitor_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Insert data into the database
$sql = "INSERT INTO contacts (first_name, last_name, phone, message) 
        VALUES ('$first_name', '$last_name', '$phone', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Thank you! Your message has been received.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>