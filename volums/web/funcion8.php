<?php
include 'funcions.php';
mostrarMenu();
$informacio = carregarInformacio();
$informacioOrdenada = ordenarPorFecha($informacio); 
echo '<h1><div class="titols">VIDEOJOC MÉS MODERN I MÉS ANTIC</div></h1>';
echo '<table>';
echo '<tr><th>ID</th><th>Nom</th><th>Desarrollador</th><th>Plataforma</th><th>Llançament</th></tr>';
foreach ($informacioOrdenada as $item) {
    echo '<tr>';
    echo '<td>' . $item['ID'] . '</td>';
    echo '<td>' . $item['Nom'] . '</td>';
    echo '<td>' . $item['Desenvolupador'] . '</td>';
    echo '<td>' . $item['Plataforma'] . '</td>';
    echo '<td>' . $item['Llançament'] . '</td>';
    echo '</tr>';
}
echo '</table>';
?>
