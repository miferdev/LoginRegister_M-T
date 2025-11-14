<?php
    session_start();
    require_once("config.php");

    $nombre = $_POST['nombre'];
    $contrasenia = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'] ?? "";
    $direccion = $_POST['direccion'] ?? "";
    $ciudad = $_POST['ciudad'] ?? "";
    $codigoPostal = $_POST['codigoPostal'] ?? "";

    $checkMail = $conn->query("SELECT email FROM CLIENTE WHERE email = '$correo'");
    
    if ($checkMail->num_rows > 0) {
    $_SESSION["register_error"] = "Email registrado";
    $_SESSION["active_form"] = "register";
    
    }else {
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