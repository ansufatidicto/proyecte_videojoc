<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<html>
<link href="index.css" rel="stylesheet" />
</html>
<?php
include "menu.php";
muestra_menu();
include "dades_connexio_BD.php";
include "clase_videojoc.php";
include "clase_plataforma.php";
if ($_SERVER["REQUEST_METHOD"] == "GET" and isset($_GET["id_plataforma"])) {
    $id_plataforma = test_input($_GET["id_plataforma"]);
    $id_videojoc = test_input($_GET["id_videojoc"]);

    $desenvolupadors = new plataforma();
    $resultadoConsulta = $desenvolupadors->inserirg($servername, $username, $password, $id_videojoc, $id_plataforma);

    echo "Inserción realizada con éxito.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$videojocs = new plataforma();
$resultadoConsulta = $videojocs->consultaTotsid_p($servername, $username, $password);
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
echo "ID Videojoc: $id_videojoc<br>";
echo "ID plataforma: $id_plataforma<br>";
?>
<html>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
<?php
echo "Llista desplegable plataforma";
$des = new plataforma();
$resultat = $des->consultaTots($servername, $username, $password);
$arrayValues = $resultat->fetchAll(PDO::FETCH_ASSOC);

foreach ($arrayValues as $row) {
    echo "<input type='radio' name='id_plataforma' value='" . $row['id'] . "'>" . $row['nom'] . "<br>";
}


echo "Llista desplegable videojoc";
echo "<select name='id_videojoc'>";
$des = new videojoc();
$resultat = $des->consultaTots($servername, $username, $password);
$arrayValues = $resultat->fetchAll(PDO::FETCH_ASSOC);

foreach ($arrayValues as $row) {
    echo "<option value='" . $row['id'] . "'>" . $row['nom'] . "</option>";
}
echo "</select>";
echo "<br>";
?>
<input type="submit" value="Insertar">
</form>

