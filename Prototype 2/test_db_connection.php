<?php
$servername = "localhost";
$username = "root";
$password = ""; // Leave empty for XAMPP
$dbname = "sss_technologies";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully!";
}

$conn->close();
?>
