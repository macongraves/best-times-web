<!--
Macon Graves
Project: Best Times - Example Webpage
-->
<html>
    <body>

        Distance is: <?php echo $_GET["distance"]; ?><br>
        Stroke is: <?php echo $_GET["stroke"]; ?><br>
        Course is: <?php echo $_GET["course"]; ?><br>
        Time is: <?php echo $_GET["time"]; ?><br>
        Location is: <?php echo $_GET["location"]; ?><br>
        Date is: <?php echo $_GET["date"]; ?><br>
        Add button is: <?php echo $_GET["add"]; ?><br>
        Other button is: <?php echo $_GET["other"]; ?><br>
        Edit button is: <?php echo $_GET["edit"]; ?><br>
        Delete button is: <?php echo $_GET["delete"]; ?><br>

        <?php

        $id = 0;

        foreach ($_GET as $name => $value) {
            echo $name.' : '.$value.'<br>';
            if(ereg("delete", $name)) {
                echo 'BINGO - we found delete button<br>';
                ereg("delete(.*)", $name, $regs);
                echo 'ID on delete is '.$regs[1].'<br>';
                $id = $regs[1];
            }
        }

        $servername = "localhost";
        $username = "********";
        $password = "********!";
        $dbname = "steeple_besttimes";

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

        if ($_GET["add"] === "Add") {

            // This code does not validate data entries.

            $sql = "INSERT INTO steeple_besttimes.besttimes (id, distance, stroke, course, time, location, date) VALUES
                    ("
                    ."'".$row["n"]."'".","
                    ."'".$_GET["distance"]."'".","
                    ."'".$_GET["stroke"]."'".","
                    ."'".$_GET["course"]."'".","
                    ."'".$_GET["time"]."'".","
                    ."'".$_GET["location"]."'".","
                    ."'".$_GET["date"]."'"
                    .")";

            echo '<br>'.$sql.'<br>';
            $result = $conn->query($sql);

            if ($result  === TRUE) {
                echo "Added record to besttimes";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        } else {
            echo "No data was added."."<br>";
        }

        if ($id != 0) {
            $sql = "DELETE FROM steeple_besttimes.besttimes where id = $id";

            echo '<br>'.$sql.'<br>';
            $result = $conn->query($sql);

            if ($result  === TRUE) {
                echo "Deleted record from besttimes";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "No data was deleted."."<br>";
        }

        $conn->close();
        ?>

    </body>
</html>
