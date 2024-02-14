<?php
include 'funcions.php';
mostrarMenu();
?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Mostra de Videojocs</title>        
    </head>
    <body>
        <h1><div class="titols">Mostra de Videojocs</div></h1>
<?php
$informacio = carregarInformacio();
mostrarVideojocs($informacio);
?>

