<?php
/* Aquest exemple, no és el mateix que al ww3school */
/* Aquí està simplificat. No fa ús d'herència */

include "dades_connexio_BD.php";
include "clase_desenvolupador.php";

$desenvolupadors = new desenvolupador();
$resultadoConsulta = $desenvolupadors->consultaTots($servername, $username, $password, $nom);
// Fetch los resultados como un array asociativo
$arrayValues = $resultadoConsulta->fetchAll(PDO::FETCH_ASSOC);

echo "<table width=\"100%\">\n";
echo "<tr>\n";
// add the table headers
foreach ($arrayValues[0] as $key => $useless) {
    echo "<th>$key</th>";
}
echo "</tr>";
// display data
foreach ($arrayValues as $row) {
    echo "<tr>";
    foreach ($row as $key => $val) {
        echo "<td>$val</td>";
    }
    echo "</tr>\n";
}
echo "</table>";
?>
