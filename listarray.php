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
    </head>
    <body>
        <?php
        $date = date('m-d-Y H:i:s');
        echo $date;
        echo '<br>Hello';
        $times = array(
            array('id' => '1', 'distance' => '50', 'stroke' => 'FR', 'course' => 'LCM',
                'time' => '25.00', 'location' => 'University of Cincinnati', 'date' => '5/2/2017'),
            array('id' => '2', 'distance' => '100', 'stroke' => 'IM', 'course' => 'SCY',
                'time' => '53.00', 'location' => 'University of Cincinnati', 'date' => '5/3/2017'),
            array('id' => '3', 'distance' => '200', 'stroke' => 'IM', 'course' => 'SCY',
                'time' => '1:50.00', 'location' => 'University of Cincinnati', 'date' => '5/1/2017')
        );
        echo '<table>';
        for ($i = 0; $i < count($times); ++$i) {
            echo '<tr>';
            echo '<td>'.$times[$i]['id'].'</td>';
            echo '<td>'.$times[$i]['distance'].'</td>';
            echo '<td>'.$times[$i]['stroke'].'</td>';
            echo '<td>'.$times[$i]['course'].'</td>';
            echo '<td>'.$times[$i]['time'].'</td>';
            echo '<td>'.$times[$i]['location'].'</td>';
            echo '<td>'.$times[$i]['date'].'</td>';
            echo '</tr>';
        }
        echo '</table>';
        ?>
        <h1>Macon Graves</h1>
        <h3>Best Times</h3>
        <p>3 entries</p>
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
        </form>
    </body>
</html>
