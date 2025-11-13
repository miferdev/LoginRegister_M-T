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
                <input type="text" name="nombre" placeholder="Nombre" required>
                <!-- <input type="text" name="apellido" placeholder="Apellido" required> -->
                <input type="email" name="correo" placeholder="Correo electrónico" required>
                <input type="text" name="telefono" placeholder="Telefono" required>
                <input type="text" name="direccion" placeholder="Direccion de Envio">
                <input type="text" name="ciudad" placeholder="Ciudad">
                <input type="text" name="codigoPostal" placeholder="Codigo Postal">
                <input type="password" name="password" placeholder="Contraseña">
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