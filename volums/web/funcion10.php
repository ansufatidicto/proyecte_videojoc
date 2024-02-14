<?php

// Incluimos el archivo funcions.php
include 'funcions.php';

// Llamamos a la función carregarInformacio para obtener la información de los videojuegos
$videojocs = carregarInformacio();

// Llamamos a la función contarVideojuegosPorAnio y obtenemos el resultado
$conteoPorAnio = contarVideojuegosPorAnio($videojocs);

// Mostramos el resultado por pantalla
mostrarMenu();  // Asumiendo que tienes una función mostrarMenu
echo '<h2>Conteo de Videojuegos por Año</h2>';

foreach ($conteoPorAnio as $anio => $conteo) {
    echo "<p>Año $anio: $conteo videojuegos</p>";
}

?>
