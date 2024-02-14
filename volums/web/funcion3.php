<?php
include 'funcions.php';
mostrarMenu();
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Videojocs</title>
</head>
<body>
    <div class="container">
        <?php
        // Uso de la función
        $archivoOriginal = 'games.json';
        $archivoResultado = 'JSON_Resultat_Eliminar.json';

        $resultado = eliminarJuegosPorFecha($archivoOriginal, $archivoResultado);

        // Cargar la información de los videojuegos
        $videojocs = carregarInformaciono2020();

        // Asignar un número a cada juego
        // $videojocsConNumeros = asignarNumeroAVideojuegos($videojocs);

        // Mostrar el resultado en forma de tabla
        echo '<h1><div class="titols">Eliminar Videojocs 2020</div></h1>';
        echo '<table>';
        echo '<tr>';
        echo '<th>Nombre</th>';
        echo '<th>Desarrollador</th>';
        echo '<th>Lanzamiento</th>';
        echo '<th>ID</th>';
        echo '</tr>';
        foreach ($videojocs as $videojoc) {
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
