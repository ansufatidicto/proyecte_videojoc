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
include "clase_usuari.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener valores del formulario si se envió
    $nom = test_input($_POST["nom"]);
    $contrasenya = test_input($_POST["contrasenya"]);

    $client = new usuari();
    $client->inserir($servername, $username, $password, $nom, $contrasenya);

    echo "<br>";
    echo 'El nom introduït és: ' . $nom . "<br>";
    echo 'El contraseña introduït és: ' . $contrasenya . "<br>";
    echo "<br>";
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<html>
<link href="index.css" rel="stylesheet" />
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    nom: <input type="text" name="nom" value="<?php echo $nom; ?>"><br>
    contraseña: <input type="text" name="contrasenya" value="<?php echo $contrasenya; ?>"><br>
    <?php
    if (isset($_SESSION['nom']) && isset($_SESSION['contrasenya'])) {
        echo '<input type="submit">';
    }
    ?>
</form>

</body>
</html>
