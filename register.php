<?php
// Database configuration
$servername = "localhost"; // Change this to your MySQL server hostname
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "food"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Values from registration form
$user_id = $_POST['user_id'];
$email_id = $_POST['email_id'];
$gender = $_POST['gender'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$age = $_POST['age'];
$food_type = $_POST['food_type'];

// SQL query to insert values into the table
$sql = "INSERT INTO users (user_id, email_id, gender, height, weight, age, food_type)
        VALUES ('$user_id', '$email_id', '$gender', '$height', '$weight', '$age', '$food_type')";

// Execute query
if ($conn->query($sql) === TRUE) {
    // If insertion is successful, redirect to index.php
    header("Location: index.php");
    exit(); // Make sure nothing else is executed after redirection
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>