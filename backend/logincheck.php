<?php
    session_start();
    require_once("config.php");

    $email = $_POST['correo'];
    $password = $_POST['password'];
    #coges cada dato del usuario de la sesion y lo guardas en una variable

    $res = $conn->query("SELECT * FROM users WHERE email = '$email'");
    #compruebas si el usuario existe por el email
    if ($res->num_rows > 0) {
        $user = $res->fetch_assoc();
        #si hay una respuesta te quedas los datos para manipularlos en el archivo al que irás
        if (password_verify($password, $user['password'])) {
            $_SESSION["name"] = $user["name"];
            header("Location: ../index.php");
            exit();
        }
    }
    $_SESSION["login_error"] = "Incorrect email or password";
    $_SESSION["active_form"] = "login";
    header("Location: ../frontend/login.php");
    exit();
?>