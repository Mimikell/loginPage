<?php
session_start();

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "login_system";

$connect = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        header("Location:success.html");
        exit();
    } else {
        header("Location:index.html?error=Invalid username or password");
        exit();
    }
}

mysqli_close($connect);
?>
