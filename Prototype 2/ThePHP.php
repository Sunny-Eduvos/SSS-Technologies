<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sss_technologies";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, description, price FROM services";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Service ID: " . $row["id"]. " - Name: " . $row["name"]. " - Description: " . $row["description"]. " - Price: $" . $row["price"]. "<br>";
    }
} else {
    echo "Error loading services";
}
$conn->close();
?>
