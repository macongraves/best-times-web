<?php
$servername = "localhost";
$username = "*************";
$password = "*********";
$dbname = "*****************";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT max(id) as n FROM besttimes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "max id: " . $row["n"].  "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
