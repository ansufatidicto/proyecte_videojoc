<html>
<link rel="stylesheet" href="css/index.css">
<body>

<header>
<h1 style="font-family: "Courier New", monospace;">
<a href="index.php">PROJECTE VIDEOJOCS PHP - FORMULARIS</a>
</h1>
<img src="img/php.png" alt="imgphp" width="80" height="80">
</header>

<nav>
<ul>
<li><a href="form_plataforma.php">PLATAFORMA</a></li>
<li><a href="form_empresa.php">EMPRESA</a></li>
<li><a href="form_genere.php">GENERE</a></li>
<li><a href="index.php">EXIT</a></li>
</ul>
</nav>
<h1> Formulari Plataforma </h1>
<form action="<?php echo htmlspecialchars($_SERVER["clase_empresa.php"]);?>" method="GET" style="width: 300px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; box-shadow: 2px 2px 5px rgba(0,0,0,0.1);">
  <label for="nom" style="display: block; margin-bottom: 10px; font-weight: bold;">Nom:</label>
  <input type="text" id="nom" name="nom" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;"><br>
  <input type="submit" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
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