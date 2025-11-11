<?php
    session_start();
    require_once("config.php");

    if (isset($_POST["register"])) {
        $nombre = $_POST['name'];
        $correo = $_POST['correo'];
        $contrasenia = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $ciudad = $_POST["ciudad"];
        $codigoPostal = $_POST["CP"];

        $checkMail = $conn->query("SELECT email FROM CLIENTES WHERE email = '$email'");
        
        if ($checkMail->num_rows > 0) {
        $_SESSION["register_error"] = "Email registrado";
        $_SESSION["active_form"] = "register";
        
        }else {
            $conn->query("INSERT INTO CLIENTES (name, email, password, role) VALUES ('$nombre', '$contrasenia', '$email', '$telefono', '$direccion_envio', '$ciudad', '$codigo_postal')");
            #si el usuario se puede registrar, se guarda en la base de datos
        }
        header("Location: index.php");
    exit();
    }
?>