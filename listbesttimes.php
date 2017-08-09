<?php
$servername = "localhost";
$username = "steeple_macon";
$password = "Charlie4!";
$dbname = "steeple_besttimes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, distance, stroke, course, time, location, date FROM besttimes ORDER BY stroke asc, distance asc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo '<table>';
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>'.$row['id'].'</td>';
        echo '<td>'.$row['distance'].'</td>';
        echo '<td>'.$row['stroke'].'</td>';
        echo '<td>'.$row['course'].'</td>';
        echo '<td>'.$row['time'].'</td>';
        echo '<td>'.$row['location'].'</td>';
        echo '<td>'.$row['date'].'</td>';
        echo '</tr>';
        // echo "<td>" . $row["id"]. " - " . $row["distance"]." ".$row["stroke"]." ".$row["course"].
        //      " ".$row["time"]." ".  "<br>";
    }
    echo '</table>';
} else {
    echo "0 results";
}
$conn->close();
?>
