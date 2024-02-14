<?php
include 'funcions.php';
mostrarMenu();
?>

<?php
$juegos = cargarinfo();
$juegosConFechaExpiracion = agregarFechaExpiracion($juegos);

$jsonResult = json_encode($juegosConFechaExpiracion, JSON_PRETTY_PRINT);

file_put_contents('JSON_Resultat_Data_Expiració.json', $jsonResult);

// Mostrar el resultado en forma de tabla
echo '<h1><div class="titols">ID DELS VIDEOJOCS</div></h1>';
echo '<table>';
echo '<tr>';
echo '<th>Nombre</th>';
echo '<th>Desarrollador</th>';
echo '<th>Lanzamiento</th>';
echo '<th>ID</th>';
echo '<th>FechaExpiracion</th>';
echo '</tr>';

foreach ($juegosConFechaExpiracion as $juego) {
    echo '<tr>';
    echo '<td>' . $juego['Nom'] . '</td>';
    echo '<td>' . $juego['Desenvolupador'] . '</td>';
    echo '<td>' . $juego['Llançament'] . '</td>';
    echo '<td>' . $juego['ID'] . '</td>';
    echo '<td>' . $juego['FechaExpiracion'] . '</td>';
    echo '</tr>';
}
echo '</table>';
?>