<?php
$host = "db";
$user = "root";
$password = "root";
$database = "testdb";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida:  " . $conn->connect_error);
}
?>