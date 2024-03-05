<?php
// creamos funcion de menú
function muestra_menu(){
if ($_SESSION["nom"] != "" and $_SESSION["contrasenya"] != ""){ // control de usuarios
    echo"<nav>";
    echo"<ul>";
    echo '<li><a href="ini_sesion.php">ini_sesion.php</a></li>';
    echo '<li><a href="alta_usuari.php">alta_usuari</a></li>';
    echo '<li><a href="consulta_videojoc.php">consulta videojoc</a></li>';
    echo '<li><a href="form_desenvolupador.php">consulta desenvolupador</a></li>';
    echo '<li><a href="form_consulta_genere.php">consulta genere</a></li>';
    echo '<li><a href="form_consulta_plataforma.php">consulta plataforma</a></li>';
    echo '<li><a href="form_consulta_videojoc.php">consulta videojoc</a></li>';
    echo '<li><a href="insertar_videojoc.php">insertar videojoc</a></li>';
    echo '<li><a href="mod_videojoc.php">mod videojoc</a></li>';
    echo '<li><a href="mod_desenvolupador.php">mod desenvolupador</a></li>';
    echo '<li><a href="mod_plataforma.php">mod plataforma</a></li>';
    echo '<li><a href="mod_genere.php">mod genere</a></li>';
    echo"<li><a href='tanca_sesio.php'>Hola " . $_SESSION['nom'] . ": ". "Log out</a></li>";
    echo"</ul>";
    echo"</nav>";
    } else { // si no tiene iniciada sesiòn solo pueden acceder a esto 
    echo"<nav>";
    echo '<ul>';
    echo '<li><a href="ini_sesion.php">ini_sesion.php</a></li>';
    echo '<li><a href="consulta_videojoc.php">consulta videojoc</a></li>';
    echo '<li><a href="form_consulta_plataforma.php">consulta plataforma</a></li>';
    echo '<li><a href="form_desenvolupador.php">consulta desenvolupador</a></li>';
    echo '<li><a href="form_consulta_genere.php">consulta genere</a></li>';
    echo '</ul>';
    echo"</nav>";
}
}
?>