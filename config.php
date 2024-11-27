<?php
$host = "localhost"; // Database host
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password is empty
$dbname = "login_system"; // Your database name

// Create connection
$con = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Optional: Set character set to UTF-8 for better compatibility
mysqli_set_charset($con, "utf8");
?>
