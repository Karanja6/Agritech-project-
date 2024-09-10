
<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "farmers_details"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>