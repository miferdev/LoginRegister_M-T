<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="container">
        <div class="form-box">
            <h2>Iniciar Sesión</h2>
            <!-- Mensaje de error -->
            <?php if (isset($error_login)) echo "<p class='error'>$error_login</p>"; ?>

            <form action="../backend/logincheck.php" method="post">
                <input type="email" name="correo" placeholder="Correo electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit" name="login">Entrar</button>
            </form>

            <p class="redirect">
                ¿No tienes cuenta?
                <a href="registro.php">Regístrate aquí</a>
            </p>
        </div>
    </div>
</body>

</html>