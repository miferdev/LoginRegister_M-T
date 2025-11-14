<?php
session_start();
require_once("config.php");

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$telefono = $_POST['telefono'] ?? "";
$direccion = $_POST['direccion'] ?? "";
$ciudad = $_POST['ciudad'] ?? "";
$codigoPostal = $_POST['codigoPostal'] ?? "";

if (!preg_match("/^[\w\.-]+@[\w\.-]+\.\w{2,4}$/", $correo)) {
    $_SESSION["register_error"] = "El correo no tiene un formato válido.";
    header("Location: ../frontend/registro.php");
    exit();
}

if (!preg_match("/^(\+34)?[6|7|9][0-9]{8}$/", $telefono)) {
    $_SESSION["register_error"] = "Teléfono no válido.";
    header("Location: ../frontend/registro.php");
    exit();
}

if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).{8,}$/", $password)) {
    $_SESSION["register_error"] = "La contraseña debe ser segura.";
    header("Location: ../frontend/registro.php");
    exit();
}

if (!preg_match("/^[0-9]{5}$/", $codigoPostal)) {
    $_SESSION["register_error"] = "Código postal no válido.";
    header("Location: ../frontend/registro.php");
    exit();
}

$contrasenia = password_hash($password, PASSWORD_DEFAULT);

$checkMail = $conn->query("SELECT email FROM CLIENTE WHERE email = '$correo'");

if ($checkMail->num_rows > 0) {
    $_SESSION["register_error"] = "Email registrado";
    $_SESSION["active_form"] = "register";
} else {
    $conn->query("INSERT INTO CLIENTE 
        (nombre,
        contrasenia,
        email,
        telefono,
        direccion_envio,
        ciudad,
        codigo_postal) VALUES 
        ('$nombre',
        '$contrasenia',
        '$correo',
        '$telefono',
        '$direccion',
        '$ciudad',
        '$codigoPostal')");

    header("Location: ../index.php");
    exit();
}

header("Location: ../frontend/registro.php");
exit();
?>
