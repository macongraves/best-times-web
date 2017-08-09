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

$sql = "SELECT max(id)+1 as n FROM besttimes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "next id: " . $row["n"].  "<br>";
} else {
    echo "0 results";
}

$sql = "INSERT INTO steeple_besttimes.besttimes (id, distance, stroke, course, time, location, date) VALUES 
	(".$row["n"].", '200', 'IM', 'SCY', '1:50.00', 'HSA', '2017-04-01')";
echo '<br>'.$sql.'<br>';
$result = $conn->query($sql);

if ($result  === TRUE) {
    echo "Added record to besttimes";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
