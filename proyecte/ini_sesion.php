<?php
// Start the session
session_start();
?>

<html>
<head>
    <link rel="stylesheet"  href="index.css">
</head>
<body> 

<?php
//iniciar sesión dos veces para que funcione
//includes
include "menu.php";
muestra_menu();
include "dades_connexio_BD.php";
include "clase_usuari.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $nom = isset($_GET["nom"]) ? test_input($_GET["nom"]) : "";
    $contrasenya = isset($_GET["contrasenya"]) ? test_input($_GET["contrasenya"]) : "";
    

    $usuari1 = new usuari();
    $resultat = $usuari1->consultaTots($servername, $username, $password, $nom, $contrasenya);
    $arrayValues = $resultat->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($arrayValues)) {
        // Verifica las credenciales del usuario aquí
        // Por ejemplo, si el usuario se autentica correctamente
        $_SESSION["nom"] = $nom; // Guarda el nombre del usuario en la sesión
       $_SESSION["contrasenya"] = $contrasenya;

    } else {
        echo "Invalid username or password.";
    }

    $nom = "";
    $contrasenya = "";
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <!-- Envía el formulario a la base de datos -->
    nom: <input type="text" name="nom" value="<?php echo $nom;?>">
    <br><br>
    contrasenya: <input type="password" name="contrasenya" value="<?php echo $contrasenya;?>">
    <br><br>
    <input type="submit" value="Submit"><!-- Boton para subir los datos  -->
</form>

</body>
</html>