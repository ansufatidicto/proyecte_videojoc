<?php
// Start the session
session_start();
?>
<html>
<link href="index.css" rel="stylesheet" />
<body>

<?php

include "menu.php";
muestra_menu();
include "dades_connexio_BD.php";
include "clase_plataforma.php";
// define variables and set to empty values

if ($_SERVER["REQUEST_METHOD"] == "GET" and $_GET["nom"] != null) {
    $id = test_input($_GET["id"]);
    $nom = test_input($_GET["nom"]);

    $client = new plataforma();
    $client -> modificar ($servername,$username,$password, $id,$nom);
    echo "<br>";
    echo 'El id introduït és: ' . $id. "<br>";
    echo 'El nom introduït és: ' . $nom. "<br>";
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
<?php
echo "Llista desplegable";
echo "<select name='id'>";
$des = new plataforma();
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

<?php
    if (isset($_SESSION['nom']) && isset($_SESSION['contrasenya'])) {
        echo '<input type="submit">';
    }
    ?>
</form>

</body>
</html>