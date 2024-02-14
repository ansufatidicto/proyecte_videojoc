<?php
// funcion5.php
include 'funcions.php';
mostrarMenu();
?>

<?php
// Cargar información desde el archivo JSON
$informacio = carregarInformacio();

// Llamar a la función para verificar registros duplicados
if (jocsRepetits(json_encode($informacio))) {
    echo '<h1>HI HA JOCS DUPLICATS. 1 true</h1>';
} else {
    echo '<h1>NO HI HA JOCS DUPLICATS 0 false.</h1>';
}
?>
