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
    <style>
        /* CSS Básico para la estructura (Mismo CSS de la versión anterior) */
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333;
        }

        /* Estilos del Encabezado (Header) */
        .header {
            background-color: #ffffff;
            color: #333;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .logo a {
            font-size: 1.5em;
            font-weight: bold;
            text-decoration: none;
            color: #333;
        }

        /* Estilos del Perfil Desplegable */
        .profile-dropdown {
            position: relative;
            display: inline-block;
        }

        .profile-btn {
            background-color: #f1f1f1; /* Nuevo color para el botón */
            color: #333;
            padding: 10px 15px;
            font-size: 16px;
            border: none; /* Quitamos el borde */
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: background-color 0.3s;
        }
        .profile-btn:hover {
            background-color: #e0e0e0;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #fff;
            min-width: 180px; /* Ancho ajustado */
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 4px;
            padding: 10px;
        }

        .dropdown-content a {
            color: #333;
            padding: 10px 15px; /* Relleno ajustado */
            text-decoration: none;
            display: block;
            border-radius: 3px;
            margin: 5px 0;
            text-align: center; /* Centrar texto */
        }
        
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        /* Estilos específicos para los nuevos botones (No logueado) */
        .btn-login {
            background-color: #007bff;
            color: white !important;
        }
        .btn-login:hover {
            background-color: #0056b3;
        }
        .btn-register {
            background-color: #28a745;
            color: white !important;
        }
        .btn-register:hover {
            background-color: #1e7e34;
        }
        .btn-logout {
            background-color: #dc3545;
            color: white !important;
        }

        /* Mostrar el desplegable al pasar el ratón */
        .profile-dropdown:hover .dropdown-content {
            display: block;
        }

        /* Estilos del Contenido Principal (Main) - Se omiten para brevedad, son los mismos */
        .main-content {
            padding: 40px 20px;
            text-align: center;
        }

        .hero {
            background: url('placeholder-hero.jpg') no-repeat center center/cover;
            height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            margin-bottom: 30px;
        }

        .hero h1 {
            font-size: 3em;
            margin-bottom: 10px;
        }

        .cta-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 25px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .product-grid {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="profile-dropdown">
            <button class="profile-btn">
                👤 <?php echo $nombre_usuario; ?> ▾
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
                    echo '<a href="login.php" class="btn-login">Iniciar Sesión</a>';
                    echo '<a href="registro.php" class="btn-register">Registrarse</a>';
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
                    <img src="https://via.placeholder.com/250/FFA07A/FFFFFF?text=Camiseta+B%C3%A1sica" alt="Camiseta Básica">
                    <h3>Camiseta Básica Algodón</h3>
                    <p class="price">25,99 €</p>
                </div>
                <div class="product-item">
                    <img src="https://via.placeholder.com/250/B0C4DE/FFFFFF?text=Jeans+Slim+Fit" alt="Jeans Slim Fit">
                    <h3>Jeans Slim Fit</h3>
                    <p class="price">49,99 €</p>
                </div>
                <div class="product-item">
                    <img src="https://via.placeholder.com/250/98FB98/FFFFFF?text=Sudadera+Oversize" alt="Sudadera Oversize">
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