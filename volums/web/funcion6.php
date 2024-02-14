<?php
include 'funcions.php';
mostrarMenu();
?>

<!DOCTYPE html>
<html lang="ca"> 
<head>
    <meta charset="UTF-8">
    <title>Comprovació de Videojocs Repetits</title>
</head>
<body>
    <h1>Comprovació de Videojocs Repetits</h1>

    <?php
    $informacioFuncion6 = carregarInformacioFuncion6();
    $juegosRepetidosFuncion6 = comprobarRepetitsFuncion6($informacioFuncion6);

    if (!empty($juegosRepetidosFuncion6)) {
        mostrarRepetits($juegosRepetidosFuncion6);
        guardarRepetidosEnJSONFuncion6($juegosRepetidosFuncion6);
        echo '<p> S\'ha creat el fitxer JSON_Resultat_repetits.json amb els registres repetits.</p>';
    } else {
        echo '<h2>No hi ha registres repetits.</h2>';
    }
    ?>

</body>
</html>