<html>
<link href="index.css" rel="stylesheet" />
</html>
<?php
// formulario conectador con form_consulta_videojoc para consultar por desenvoluapdor
//include de las classes necesarias
include "dades_connexio_BD.php";
include "clase_videojoc.php";

//$id_desenvolupador = test_input($_GET["id_desenvolupador"]); // accede al valor id_desenvolupador que se ha pasado por el get
//creamos una instancias de la clase videojoc y llamamos a la funcion consultatotsdesenvolupador para consultar por el desenvolupador.
$videojocs = new videojoc();
$arrayValues = $videojocs->consultdesenvolupador($servername, $username, $password, $_GET["id_desenvolupador"]);
    //imprimimos los datos
if (!empty($arrayValues)) {
    echo "<table width=\"100%\">\n";
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
    echo "</tab>";

}
?>
<!-- botón para volver al form oroginal-->
<html>
<link href="index.css" rel="stylesheet" />
    <form action="form_consulta_videojoc.php" method="GET">
    <input type="submit" value="volver">
    </form>
</html>

