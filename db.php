<?php
$servername = "localhost";
$username = "abolton10";
$password = "abolton10";
$dbname = "abolton10";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
