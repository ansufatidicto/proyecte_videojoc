<?php
session_start();
?>
<html>
<link href="index.css" rel="stylesheet" />
</html>
<?php
/* Aquest exemple, no és el mateix que al ww3school */
/* Aquí està simplificat. No fa ús d'herència */
include "menu.php";
muestra_menu();
include "dades_connexio_BD.php";
include "clase_videojoc.php";
include "clase_desenvolupador.php";
if ($_SERVER["REQUEST_METHOD"] == "GET" and $_GET["nom"] != null) {
    $nom = test_input($_GET["nom"]);

    $desenvolupadors = new videojoc();
    $resultadoConsulta = $desenvolupadors->consultanom($servername, $username, $password, $nom);
    // Fetch los resultados como un array asociativo
    $arrayValues = $resultadoConsulta->fetchAll(PDO::FETCH_ASSOC);
    // Mostrar la tabla solo si hay resultados

if (!empty($arrayValues)) {
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

}
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

  }
$desenvolupadors = new videojoc();
$resultadoConsulta = $desenvolupadors->consultanom($servername, $username, $password, $nom);
// Fetch los resultados como un array asociativo
$arrayValues = $resultadoConsulta->fetchAll(PDO::FETCH_ASSOC);

?>
<html>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
    Nombre a buscar: <input type="text" name="nom">
    <input type="submit" value="Buscar">
</form>


<form action="cons_fecha.php" method="GET">
fecha: <input type="text" name="data_llancament">
<input type="submit" value="eliminar2">
</form>

<form action="cons_desenvolupador.php" method="GET">
<?php
echo "Llista desplegable";
echo "<select name='id_desenvolupador'>";
$des = new desenvolupador();
$resultat =$des->consultaTots("db","root","iesmanacor");
$arrayValues = $resultat->fetchAll(PDO::FETCH_ASSOC); 
foreach ($arrayValues as $row)
{
      echo "<option value='". $row['id']. "'>" .  $row['nom'] . "</option>";
}
echo "</select>";
echo "<br>";
?>
<input type="submit" value="eliminar2">
</form>
