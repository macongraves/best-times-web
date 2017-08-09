<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Best Times - Macon Graves</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>Macon Graves</h1>
        <h3>Best Times</h3>
        <form action="debug.php" method="get">
        <table>
            <tr>
                <td>ID</td>
                <td>Distance</td>
                <td>Stroke</td>
                <td>Course</td>
                <td>Time</td>
                <td>Location</td>
                <td>Date</td>
            </tr>
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
            while($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['distance'].'</td>';
                echo '<td>'.$row['stroke'].'</td>';
                echo '<td>'.$row['course'].'</td>';
                echo '<td>'.$row['time'].'</td>';
                echo '<td>'.$row['location'].'</td>';
                echo '<td>'.$row['date'].'</td>';
                echo '<td><input value="Edit" name="edit" type="submit"></td>';
                echo '<td><input value="Delete" name="delete'.$row['id'].'" type="submit"></td>';
                echo '</tr>';
                // echo "<td>" . $row["id"]. " - " . $row["distance"]." ".$row["stroke"]." ".$row["course"].
                //      " ".$row["time"]." ".  "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
            <tr>
                <td></td>
                <td><input name="distance" type="text"></td>
                <td><input name="stroke" type="text"></td>
                <td><input name="course" type="text"></td>
                <td><input name="time" type="text"></td>
                <td><input name="location" type="text"></td>
                <td><input name="date" type="text"></td>
                <td><input value="Add" name="add" type="submit"></td>
                <td><input value="Other" name="other" type="submit"></td>
            </tr>
        </table>
        </form>
        
        <p>3 entries</p>
        <!-- <form action="debug.php" method="get">
        <table>
            
            <tr>
                <td>1</td>
                <td>50</td>
                <td>FR</td>
                <td>LCM</td>
                <td>25.00</td>
                <td>University of Cincinnati</td>
                <td>5/2/2017</td>
                <td><button>Edit</button></td>
                <td><button>Delete</button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>100</td>
                <td>IM</td>
                <td>SCY</td>
                <td>53.00</td>
                <td>University of Cincinnati</td>
                <td>5/3/2017</td>
                <td><button>Edit</button></td>
                <td><button>Delete</button></td>
            </tr>
            <tr>
                <td>3</td>
                <td>200</td>
                <td>IM</td>
                <td>SCY</td>
                <td>1:50.00</td>
                <td>University of Cincinnati</td>
                <td>5/1/2017</td>
                <td><button>Edit</button></td>
                <td><button>Delete</button></td>
            </tr>
            <tr>
                <td></td>
                <td><input name="distance" type="text"></td>
                <td><input name="stroke" type="text"></td>
                <td><input name="course" type="text"></td>
                <td><input name="time" type="text"></td>
                <td><input name="location" type="text"></td>
                <td><input name="date" type="text"></td>
                <td><input value="Add" name="add" type="submit"></td>
                <td><input value="Other" name="other" type="submit"></td>
            </tr>
        </table>
        </form> -->
        <p id="footer">&COPY; 2017 Macon Graves</p>
    </body>
</html>
