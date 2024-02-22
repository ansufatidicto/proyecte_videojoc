<?php
/* Aquest exemple, no és el mateix que al ww3school */
/* Aquí està simplificat. No fa ús d'herència */

include "dades_connexio_BD.php";
include "clase_videojoc.php";

    $videojocs = new videojoc();
    $videojocs->eliminar($servername, $username, $password, $_GET["nom"]);
    echo "Videojuego eliminado correctamente.";
