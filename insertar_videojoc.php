<html>
<link href="css.css" rel="stylesheet" />
<body>

<?php
include "dades_connexio_BD.php";
include "clase_videojoc.php";
include "clase_desenvolupador.php";
// define variables and set to empty values

if ($_SERVER["REQUEST_METHOD"] == "GET" and $_GET["nom"] != null) {
    $nom = test_input($_GET["nom"]);
    $data_llancament = test_input($_GET["data_llancament"]);
    $pegi = test_input($_GET["pegi"]);
    $id_desenvolupador = test_input($_GET["id_desenvolupador"]);
    $id_plataforma = test_input($_GET["id_plataforma"]);

  
    $client = new videojoc();
    $client -> inserir($servername, $username, $password, $nom ,$data_llancament, $pegi ,$id_desenvolupador ,$id_plataforma);
    echo "<br>";
    echo 'El nom introduït és: ' . $nom. "<br>";
    echo 'El data_llancament introduït és: ' . $data_llancament. "<br>";
    echo 'El pegi introduït és: ' . $pegi. "<br>";
    echo 'El id_desenvolupador introduït és: ' . $id_desenvolupador. "<br>";
    echo 'El id_plataforma introduït és: ' . $id_plataforma. "<br>";
    echo "<br>";
  
  
  }
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  
  }
  
  ?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
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
    <input type="submit">
</form>

</body>
</html>