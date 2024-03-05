<?php
session_start(); // Inicia una sesión de PHP

// Destruye la sesión actual del usuario
session_destroy();

// activamos el almacenamiento del búfer de salida
ob_start();

// Redirige a la página ini_sesion.php
header('Location: ini_sesion.php');
exit;
?>

