<?php
$host = "db";
$user = "root";
$password = "root";
$database = "users_db";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida:  " . $conn->connect_error);
}
?>