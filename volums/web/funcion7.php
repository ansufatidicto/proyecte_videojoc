<?php
include 'funcions.php';
mostrarMenu();
?>

<?php
$juegos = cargarinfo();
$juegosSinRepetir = eliminarRepetits($juegos);

guardarSinRepetirEnJSON($juegosSinRepetir);

//echo 'Se ha creado el JSON sin registros repetidos.';
?>

<?php
echo '<h1>Videojocs sense Repetits</h1>';
echo '<table>';
echo '<tr>';
echo '<th>Nombre</th>';
echo '<th>Desarrollador</th>';
echo '<th>Lanzamiento</th>';
echo '<th>ID</th>';
echo '</tr>';

foreach ($juegosSinRepetir as $juego) {
    echo '<tr>';
    echo '<td>' . $juego['Nom'] . '</td>';
    echo '<td>' . $juego['Desenvolupador'] . '</td>';
    echo '<td>' . $juego['Llançament'] . '</td>';
    echo '<td>' . $juego['ID'] . '</td>';
    echo '</tr>';
}
echo '</table>';
?>