<?php
    session_start();
    require_once("config.php");

    $nombre = $_POST["name"];
    $contrasenia = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"] ?? "";
    $direccion = $_POST["direccion"] ?? "";
    $ciudad = $_POST["ciudad"] ?? "";
    $codigoPostal = $_POST["CP"] ?? "";

    $checkMail = $conn->query("SELECT email FROM CLIENTES WHERE email = '$email'");
    
    if ($checkMail->num_rows > 0) {
    $_SESSION["register_error"] = "Email registrado";
    $_SESSION["active_form"] = "register";
    
    }else {
        $conn->query("INSERT INTO CLIENTES (nombre, contrasenia, email, telefono, direccion_envio, ciudad, codigo_postal) VALUES ('$nombre', '$contrasenia', '$correo', '$telefono', '$direccion', '$ciudad', '$codigoPostal')");
    }
    header("Location: ../frontend/registro.php");
    exit();
    
?>