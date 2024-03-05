<?php
session_start(); // Start the session
?>
<html>
<link href="index.css" rel="stylesheet" />
<body>

<?php
//include del menu, con y clases
include "menu.php";
muestra_menu();
include "dades_connexio_BD.php";
include "clase_plataforma.php";
//creamos una instancias de la clase plataforma y llamamos a la funcion consutatots.
$plataformas = new plataforma();
$resultadoConsulta = $plataformas->consultaTots($servername, $username, $password, $nom);
//consultamos a la base de datos y recuperamos los datos dentro de una array 
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
<?php
    if (isset($_SESSION['nom']) && isset($_SESSION['contrasenya'])) { //control de usuarios
       echo '<form action="eliminar_plataforma.php" method="GET">';
       echo 'eliminar(id): <input type="text" name="id">';
       echo '<input type="submit" value="eliminar2">';
       echo '</form>';
       echo '<form action="mod_plataforma.php" method="GET">';
       echo '<input type="submit" value="modifica">';
       echo '</form>';
    }
?>