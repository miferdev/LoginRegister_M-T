<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="container">
        <div class="form-box">
            <h2>Crear Cuenta</h2>
            <!-- Mensaje de error -->
            <?php if (isset($error_register)) echo "<p class='error'>$error_register</p>"; ?>

            <form action="../backend/registercheck.php" method="post">
                <input type="text" name="nombre" placeholder="Nombre completo" required>
                <input type="email" name="correo" placeholder="Correo electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit" name="register">Registrar</button>
            </form>

            <p class="redirect">
                ¿Ya tienes una cuenta?
                <a href="login.php">Inicia sesión aquí</a>
            </p>
        </div>
    </div>
</body>

</html>