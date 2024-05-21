<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infinity";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Basic login query without prepared statement (for simplicity)
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['email'] = $email;
        echo '<script>alert("This is valid");</script>';
        // Redirect to index.php or another page
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid email or password";
    }
}

// Check if signup form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Basic check for existing user (for simplicity)
    $existing_user_query = "SELECT * FROM users WHERE email='$email'";
    $existing_user_result = $conn->query($existing_user_query);

    if ($existing_user_result->num_rows > 0) {
        echo "User already exists";
    } else {
        // Insert new user without hashing password (for simplicity)
        $insert_user_query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($insert_user_query) === TRUE) {
            echo "Registration successful";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>