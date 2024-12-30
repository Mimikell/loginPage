<?php
session_start();

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "login_system";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    
    if (mysqli_query($conn, $sql)) {
        // Redirect to the login page after registration
        header("Location: ../html/index.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

