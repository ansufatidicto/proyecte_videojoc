<?php
session_start(); // Start the session
?>

<?php
//include del menu
include "menu.php";
muestra_menu();
//include de las classes necesarias
include "dades_connexio_BD.php";
include "clase_desenvolupador.php";

// Definir variables y control para que no inserte datos vacios en la base de datos
if ($_SERVER["REQUEST_METHOD"] == "GET" and $_GET["nom"] != null) {
    $nom = test_input($_GET["nom"]);

//creamos una instancias de la clase desenvolupador y llamamos a la funcion inerir.
    $client = new desenvolupador();
    $client -> inserir($servername, $username, $password, $nom );
    echo "Inserción realizada.";
    //mostramos los valores introducidos
    echo "<br>";
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
<html>
<head>
    <link href="index.css" rel="stylesheet" />
</head>
<body>
<!-- formulario que envia los datos de la misma pagina con el metodo get-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
    nom: <input type="text" name="nom"><br>
    <?php
    //verificamos si tienes iniciada la session y enviamos el formulario
    if (isset($_SESSION['nom']) && isset($_SESSION['contrasenya'])) {
        echo '<input type="submit">';
    }
    ?>
</form>

</body>
</html>