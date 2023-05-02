<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'onlinestore';
$port = '4306';

$conn = mysqli_connect($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>