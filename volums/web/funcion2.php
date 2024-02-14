<?php
include 'funcions.php';
mostrarMenu();
?>

<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID DELS VIDEOJOCS</title>
</head>
<body>
    <div class="container">
        <?php
        // Cargar la información de los videojuegos
        $videojocs = carregarInformacio();

        // Asignar un número a cada juego
        $videojocsConNumeros = asignarNumeroAVideojuegos($videojocs);

        // Mostrar el resultado en forma de tabla
        echo '<h1><div class="titols">ID DELS VIDEOJOCS</div></h1>';
        echo '<table>';
        echo '<tr>';
        echo '<th>Nombre</th>';
        echo '<th>Desarrollador</th>';
        echo '<th>Lanzamiento</th>';
        echo '<th>ID</th>';
        echo '</tr>';
        foreach ($videojocsConNumeros as $videojoc) {
            echo '<tr>';
            echo '<td>' . $videojoc['Nom'] . '</td>';
            echo '<td>' . $videojoc['Desenvolupador'] . '</td>';
            echo '<td>' . $videojoc['Llançament'] . '</td>';
            echo '<td>' . $videojoc['ID'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        ?>
    </div>
</body>
</html>
