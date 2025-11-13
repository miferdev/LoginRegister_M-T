<?php
// INICIA LA SESIÓN DE PHP
session_start();

// Lógica de Verificación:
// Comprobamos si la variable de sesión 'user_logged_in' existe y es TRUE.
// En un sistema real, se comprobaría la existencia de un ID de usuario o similar.
$usuario_logueado = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;

// Simulación de Nombre de Usuario (para mostrar si está logueado)
$nombre_usuario = $usuario_logueado ? (isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Usuario') : 'Perfil';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Ropa | Moda y Estilo</title>
    <link rel="stylesheet" href="./frontend/css/index.css">
</head>
<body>

    <header class="header">
        <div class="profile-dropdown">
            <button class="profile-btn">
                <?php echo $nombre_usuario; ?> ▾
            </button>
            <div class="dropdown-content">
                <?php
                if ($usuario_logueado) {
                    // CONTENIDO SI EL USUARIO ESTÁ LOGUEADO
                    echo '<span style="display: block; padding: 5px 15px; font-weight: bold; border-bottom: 1px solid #eee;">¡Hola, ' . $nombre_usuario . '!</span>';
                    echo '<a href="micuenta.php">Mi Cuenta</a>';
                    echo '<a href="pedidos.php">Mis Pedidos</a>';
                    
                    // Botón/enlace para cerrar sesión
                    echo '<a href="logout.php" class="btn-logout" style="margin-top: 10px;">Cerrar Sesión</a>';
                } else {
                    // CONTENIDO SI EL USUARIO NO ESTÁ LOGUEADO (BOTONES REQUERIDOS)
                    echo '<a href="../frontend/login.php">Iniciar Sesión</a>';
                    echo '<a href="../frontend/registro.php" class="btn-register">Registrarse</a>';
                }

               
                ?>
            </div>
        </div>

        <div class="logo">
            <a href="index.php">CLOTHING SHOP</a>
        </div>

        <nav class="main-nav">
            <a href="carrito.php" style="text-decoration: none; color: #333; margin-left: 20px;">🛒 Carrito (0)</a>
        </nav>
    </header>

    <main class="main-content">

        <section class="hero" style="background-image: url('https://via.placeholder.com/1200x400/87CEEB/FFFFFF?text=Nueva+Colecci%C3%B3n+Invierno');">
            <h1>Descubre la Última Moda</h1>
            <p>Estilo fresco y tendencias exclusivas para ti.</p>
            <a href="tienda.php" class="cta-btn">Ver Tienda Ahora</a>
        </section>

        <section class="featured-products">
            <h2>🔥 Destacados de la Semana</h2>
            <div class="product-grid">
                <div class="product-item">
                    <img src="./frontend/img/camiseta.jpg" alt="Camiseta Básica">
                    <h3>Camiseta Básica Algodón</h3>
                    <p class="price">25,99 €</p>
                </div>
                <div class="product-item">
                    <img src="./frontend/img/vaqueros.jpg" alt="Jeans Slim Fit">
                    <h3>Jeans Slim Fit</h3>
                    <p class="price">49,99 €</p>
                </div>
                <div class="product-item">
                    <img src="./frontend/img/sudadera.jpg" alt="Sudadera Oversize">
                    <h3>Sudadera Oversize</h3>
                    <p class="price">39,99 €</p>
                </div>
            </div>
        </section>

    </main>

    <footer style="background-color: #333; color: white; text-align: center; padding: 20px 0; margin-top: 50px;">
        <p>&copy; <?php echo date("Y"); ?> Clothing Shop. Todos los derechos reservados.</p>
    </footer>

</body>
</html>