<?php
// Start the session
session_start();
?>
<html>
<link href="index.css" rel="stylesheet" />
<body>

<?php
//include del menu
include "menu.php";
muestra_menu();
include "dades_connexio_BD.php";
include "clase_desenvolupador.php";
// Definir variables y control para que no inserte datos vacios en la base de datos
if ($_SERVER["REQUEST_METHOD"] == "GET" and $_GET["nom"] != null) {
    $id = test_input($_GET["id"]);
    $nom = test_input($_GET["nom"]);
//creamos una instancias de la clase desenvolupador y llamamos a la funcion modificar.
    $client = new desenvolupador();
    $client -> modificar ($servername,$username,$password, $id,$nom);
    echo "<br>";
    echo 'El id introduït és: ' . $id. "<br>";
    echo 'El nom introduït és: ' . $nom. "<br>";
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
<?php
echo "Llista desplegable";
echo "<select name='id'>";
$des = new desenvolupador();
$resultat =$des->consultaTots($servername,$username,$password);
$arrayValues = $resultat->fetchAll(PDO::FETCH_ASSOC);
foreach ($arrayValues as $row)
{
      echo "<option value='". $row['id']. "'>" .  $row['id'] . "</option>";
}
echo "</select>";
echo "<br>";
?>
<br>
nom: <input type="text" name="nom"><br>
 <!-- verificamos si tienes iniciada la session y enviamos el formulario-->
<?php
    if (isset($_SESSION['nom']) && isset($_SESSION['contrasenya'])) {
        echo '<input type="submit">';
    }
    ?>
</form>

</body>
</html>