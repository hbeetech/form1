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

// Collect form data securely
$first_name = htmlspecialchars($_POST['first_name']);
$last_name = htmlspecialchars($_POST['last_name']);
$phone = htmlspecialchars($_POST['phone']);
$message = htmlspecialchars($_POST['message']);

// Insert data into the database using prepared statements
$stmt = $conn->prepare("INSERT INTO contacts (first_name, last_name, phone, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $first_name, $last_name, $phone, $message);

if ($stmt->execute()) {
    echo "Thank you! Your message has been received.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>