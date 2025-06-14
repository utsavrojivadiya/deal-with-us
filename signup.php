<?php
include 'db.php';

// Get data from form
$email = $_POST['email'];
$alt_email = $_POST['alt_email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$state = $_POST['state'];
$city = $_POST['city'];

// Check if passwords match
if ($password !== $confirm_password) {
    die("Passwords do not match.");
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert into database
$sql = "INSERT INTO users (email, alt_email, first_name, last_name, password, phone, address, state, city)
        VALUES ('$email', '$alt_email', '$first_name', '$last_name', '$hashed_password', '$phone', '$address', '$state', '$city')";

if ($conn->query($sql) === TRUE) {
    echo "Signup successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
