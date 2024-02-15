<html>
<link href="css.css" rel="stylesheet" />
<body>

<form action="<?php echo htmlspecialchars($_SERVER["clase_plataforma.php"]);?>" method="GET">
nom: <input type="text" name="nom"><br>
<input type="submit">
</form>


<?php
include "dades_connexio_BD.php";
include "clase_plataforma.php";
// define variables and set to empty values

if ($_SERVER["REQUEST_METHOD"] == "GET" and $_GET["nom"] != null) {
    $nom = test_input($_GET["nom"]);

  
    $client = new plataforma();
    $client -> inserir($servername, $username, $password, $nom);
  
  
    echo 'El nom introduït és: ' . $nom;
    echo "<br>";
  
  
  }
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  
  }
  
  ?>


</body>
</html>