<?php
session_start(); // Inicia una sesión de PHP

// Destruye la sesión actual del usuario
session_destroy();

// Asegúrate de que no haya ningún contenido de salida previo
ob_start();

// Redirige al usuario a la página "ini_sesion.php"
header('Location: ini_sesion.php');
exit;
?>

