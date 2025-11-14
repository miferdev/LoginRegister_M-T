<?php
session_start();

// Limpiar todas las variables de sesión
$_SESSION = array();

// Destruir la sesión por completo
session_destroy();

// Redirigir al usuario al inicio
header("Location: ../index.php");
exit();
?>
