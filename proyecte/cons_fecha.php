<html>
<link href="index.css" rel="stylesheet" />
</html>
<?php
// formulario conectador con form_consulta_videojoc para consultar por fecha
//include de las classes necesarias
include "dades_connexio_BD.php";
include "clase_videojoc.php";

$videojocs = new videojoc();
$arrayValues = $videojocs->consultdata($servername, $username, $password, $_GET["data_llancament"]);

if (!empty($arrayValues)) {
    echo "<table width=\"100%\">\n";
    echo "<tr>\n";
    // añadir las cabeceras de la tabla
    foreach ($arrayValues[0] as $key => $useless) {
        echo "<th>$key</th>";
    }
    echo "</tr>";
    // mostrar los datos
    foreach ($arrayValues as $row) {
        echo "<tr>";
        foreach ($row as $key => $val) {
            echo "<td>$val</td>";
        }
        echo "</tr>\n";
    }
    echo "</table>";
}

?>
<form action="form_consulta_videojoc.php" method="GET">
<input type="submit" value="volver">
</form>