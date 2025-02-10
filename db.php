<?php
$host = "localhost";
$user = "root";  // Default XAMPP user
$pass = "";      // No password by default
$dbname = "manga_subscribers";

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
