<?php
session_start(); // Start the session
?>
<html>
<link href="index.css" rel="stylesheet" />
<body>

<?php
//include del menu
include "menu.php";
muestra_menu();
include "dades_connexio_BD.php";
include "clase_genere.php";
//creamos una instancias de la clase genere y llamamos a la funcion consutatots.
$generes = new genere();
$resultadoConsulta = $generes->consultaTots($servername, $username, $password, $nom);
$arrayValues = $resultadoConsulta->fetchAll(PDO::FETCH_ASSOC); //consultamos a la base de datos y recuperamos los datos dentro de una array 

echo "<table width=\"100%\">\n";
echo "<tr>\n";
// add the table headers
foreach ($arrayValues[0] as $key => $useless) {
    echo "<th>$key</th>";
}
echo "<th>eliminar</th>"; 
echo "<th>modificar</th>";
echo "</tr>";
// display data
foreach ($arrayValues as $row) {
    echo "<tr>";
    foreach ($row as $key => $val) {
        echo "<td>$val</td>";
    }
    if (isset($_SESSION['nom']) && isset($_SESSION['contrasenya'])) { //control de usuarios
    echo '<td><a href="eliminar_genere.php?id=' . $row['id'] . '">Eliminar</a></td>'; // Enlace para eliminar
    echo '<td><a href="mod_genere.php">modificar</a></td>'; // Enlace para modificar
    }
    echo "</tr>\n";
}
echo "</table>";
?>
