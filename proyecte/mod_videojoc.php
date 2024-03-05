<?php
// Start the session
session_start();
?>
<html>
<link href="index.css" rel="stylesheet" />
<body>

<?php
//include del menu y clases
include "menu.php";
muestra_menu();
include "dades_connexio_BD.php";
include "clase_videojoc.php";
include "clase_desenvolupador.php";
// Definir variables y control para que no inserte datos vacios en la base de datos
if ($_SERVER["REQUEST_METHOD"] == "GET" and $_GET["nom"] != null) {
    $id = test_input($_GET["id"]);
    $nom = test_input($_GET["nom"]);
    $data_llancament = test_input($_GET["data_llancament"]);
    $pegi = test_input($_GET["pegi"]);
    $id_desenvolupador = test_input($_GET["id_desenvolupador"]);
    $id_plataforma = test_input($_GET["id_plataforma"]);

//creamos una instancias de la clase videojoc y llamamos a la funcion modificar.
    $client = new videojoc();
    $client -> modificar ($servername,$username,$password, $id,$nom, $data_llancament, $pegi, $id_desenvolupador, $id_plataforma);
    echo "<br>";
    echo 'El id introduït és: ' . $id. "<br>";
    echo 'El nom introduït és: ' . $nom. "<br>";
    echo 'El data_llancament introduït és: ' . $data_llancament. "<br>";
    echo 'El pegi introduït és: ' . $pegi. "<br>";
    echo 'El id_desenvolupador introduït és: ' . $id_desenvolupador. "<br>";
    echo 'El id_plataforma introduït és: ' . $id_plataforma. "<br>";
    echo "<br>";
  }
  //funcion para depurar y validar los datos introduciodos.
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  ?>
    <!-- formulario que envia los datos de la misma pagina con el metodo get-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
id: <input type="text" name="id"><br>
nom: <input type="text" name="nom"><br>
data_llancament: <input type="text" name="data_llancament"><br>
pegi: <input type="text" name="pegi"><br>
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
id_plataforma: <input type="text" name="id_plataforma"><br>
 <!-- verificamos si tienes iniciada la session y enviamos el formulario-->
<?php
    if (isset($_SESSION['nom']) && isset($_SESSION['contrasenya'])) {
        echo '<input type="submit">';
    }
    ?>
</form>

</body>
</html>