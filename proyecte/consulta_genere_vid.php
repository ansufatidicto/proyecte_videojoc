<?php
// Start the session
session_start();
?>
<html>
<link href="index.css" rel="stylesheet" />
</html>
<?php
//include del menu
include "menu.php";
muestra_menu();
//include de las classes necesarias

include "dades_connexio_BD.php";
include "clase_videojoc.php";
include "clase_genere.php";
// Definir variables y control para que no inserte datos vacios en la base de datos

if ($_SERVER["REQUEST_METHOD"] == "GET" and isset($_GET["id_genere"])) {
    $id_genere = test_input($_GET["id_genere"]);
    $id_videojoc = test_input($_GET["id_videojoc"]);
//creamos una instancias de la clase genere y llamamos a la funcion inerir.

    $desenvolupadors = new genere();
    $resultadoConsulta = $desenvolupadors->inserirg($servername, $username, $password, $id_videojoc, $id_genere);

    echo "Inserción realizada.";
    //mostramos los valores introducidos
    echo "<br>";
    echo 'El id_vid introduït és: ' . $id_videojoc. "<br>";
    echo 'El id_genere introduït és: ' . $id_genere. "<br>";
    echo "<br>";
}
  //funcion para depurar y validar los datos introduciodos.
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//creamos una instancias de la clase genere y llamamos a la funcion consutatotsid_p.

$videojocs = new genere();
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
?>
<html>
<head>
    <link href="index.css" rel="stylesheet" />
</head>
<body>
    <!-- formulario que envia los datos de la misma pagina con el metodo get-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
    <?php
        //radio button 
    echo "select genere";
    $des = new genere();
    $resultat = $des->consultaTots($servername, $username, $password);
    $arrayValues = $resultat->fetchAll(PDO::FETCH_ASSOC);
        //imprimimos los datos
    foreach ($arrayValues as $row) {
        echo "<input type='radio' name='id_genere' value='" . $row['id'] . "'>" . $row['nom'] . "<br>";
    }
        //lista desplegable 
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
    <!-- botòn-->
    <input type="submit" value="Insertar">
</form>

