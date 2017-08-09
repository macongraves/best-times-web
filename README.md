# Best Times - web development example
This project is a webpage that allows users to add, edit, or remove recorded swimming times in a table/database format.
##### Creating a static example table in HTML
```html
<table>
    <tr>
        <td>Distance</td>
        <td>Stroke</td>
        <td>Course</td>
        <td>Time</td>
        <td>Location</td>
        <td>Date</td>
    </tr>
    <tr>
        <td>50</td>
        <td>FR</td>
        <td>LCM</td>
        <td>25.00</td>
        <td>University of Cincinnati</td>
        <td>5/2/2017</td>
        <td><button>Edit</button></td>
        <td><button>Delete</button></td>
    </tr>
</table>
```
##### Creating a connection to server in PHP
```php
$servername = "exampleservername";
$username = "exampleusername";
$password = "examplepassword";
$dbname = "exampledbname";

$conn = new mysqli($servername, $username, $password, $dbname);
```
##### Checking the server connection in PHP
```php
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
```
##### Query database for existing records
```php
$sql = "SELECT id, distance, stroke, course, time, location, date FROM besttimes ORDER BY stroke asc, distance asc";
$result = $conn->query($sql);
```
