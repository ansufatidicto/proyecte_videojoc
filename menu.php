<?php
function muestra_menu(){
if ($_SESSION["nom"] != "" and $_SESSION["contrasenya"] != ""){
    echo"<nav>";
    echo"<ul>";
    echo '<li><a href="alta_usuari.php">alta_usuari</a></li>';
    echo '<li><a href="tanca_sesio.php">tanca sesio</a></li>';
    echo '<li><a href="form_consulta_videojoc.php">consulta videojoc</a></li>';
    echo '<li><a href="insertar_videojoc.php">insertar videojoc</a></li>';
    echo"<li><a href='tanca_sesio.php'>Hola " . $_SESSION['nom'] . ": ". "Log out</a></li>";
    echo"</ul>";
    echo"</nav>";
    } else {
    echo"<nav>";
    echo '<ul>';
    echo '<li><a href="ini_sesion.php">ini_sesion.php</a></li>';
    echo '</ul>';
    echo"</nav>";
}
}
?>