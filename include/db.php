<?php
$servername = "localhost";
$username = "root";  // Change this as per your MySQL username
$password = "";  // Change this as per your MySQL password
$dbname = "loydsgym";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>