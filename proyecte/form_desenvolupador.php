<?php
// Start the session
session_start();
?>
<html>
<link href="index.css" rel="stylesheet" />
<body>

<?php
include "menu.php";
muestra_menu();
include "dades_connexio_BD.php";
include "clase_desenvolupador.php";

$desenvolupadors = new desenvolupador();
$resultadoConsulta = $desenvolupadors->consultaTots($servername, $username, $password, $nom);
// Fetch los resultados como un array asociativo
$arrayValues = $resultadoConsulta->fetchAll(PDO::FETCH_ASSOC);

echo "<table width=\"100%\">\n";
echo "<tr>\n";
foreach ($arrayValues[0] as $key => $useless) {
    echo "<th>$key</th>";
}
echo "</tr>";
foreach ($arrayValues as $row) {
    echo "<tr>";
    foreach ($row as $key => $val) {
        echo "<td>$val</td>";
    }
    echo "</tr>\n";
}
echo "</table>";
?>
<?php
    if (isset($_SESSION['nom']) && isset($_SESSION['contrasenya'])) {
       echo '<form action="eliminar_desenvolupador.php" method="GET">';
       echo 'eliminar(id): <input type="text" name="id">';
       echo '<input type="submit" value="eliminar2">';
       echo '</form>';

       echo '<form action="mod_desenvolupador.php" method="GET">';
       echo '<input type="submit" value="modifica">';
       echo '</form>';
    }
?>