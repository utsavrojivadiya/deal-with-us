<?php
include 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Fetch user by email
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verify password
    if (password_verify($password, $user['password'])) {
        echo "Login successful! Welcome, " . $user['first_name'];
        // You can redirect to dashboard here
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No user found with that email.";
}

$conn->close();
?>
