<?php
    session_start();
    require_once("config.php");

    $correo = $_POST['correo'];
    $password = $_POST['password'];
    #coges cada dato del usuario de la sesion y lo guardas en una variable

    $res = $conn->query("SELECT * FROM CLIENTE WHERE email = '$correo'");
    #compruebas si el usuario existe por el correo
    if ($res->num_rows > 0) {
        $user = $res->fetch_assoc();
        #si hay una respuesta te quedas los datos para manipularlos en el archivo al que irás
        if (password_verify($password, $user['contrasenia'])) {
            $_SESSION["nombre"] = $user["nombre"];
            header("Location: ../index.php");
            exit();
        }
    }
    $_SESSION["login_error"] = "Incorrect correo or password";
    $_SESSION["active_form"] = "login";
    header("Location: ../frontend/login.php");
    exit();
?>