<?php

// Configuración de la base de datos
$servername = "db";
$username = "root";
$password = "iesmanacor";

// Conexión a la base de datos
try {
    $conn = new PDO("mysql:host=$servername;dbname=videojocs", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed2: " . $e->getMessage();
}

// Ruta al archivo JSON
$ruta_json = 'games.json';

// Leer el contenido del archivo JSON
$json_content = file_get_contents($ruta_json);

// Decodificar el JSON a un array asociativo
$data = json_decode($json_content, true);

// Recorrer el array y ejecutar la inserción en la base de datos
//$data_llancament = date('Y-m-d', strtotime($registro['Llançament']));

// Recorrer el array y ejecutar la inserción en la base de datos
foreach ($data as $registro) {
    // Suponiendo que tienes un archivo JSON con campos específicos
    $nom_desenvolupador = $registro['Desenvolupador'];

    // Ejecutar la consulta de inserción
    $consulta_desenvolupador = "INSERT INTO desenvolupador (id, nom) VALUES (NULL, '$nom_desenvolupador')";
    $last_desenvolup = $conn->lastInsertId();
    try {
        $conn->exec($consulta_desenvolupador);
        $nom_videojoc = $registro['Nom'];
        $data_llancament = $registro['Llançament'];
        $id_desenvolupador = $last_desenvolup;
        
        // Ejecutar la consulta de inserción para Videojoc
        $consulta_videojoc = "INSERT INTO videojoc (nom, data_llancament, pegi, id_desenvolupador) VALUES ('$nom_videojoc', '$data_llancament', NULL, '$id_desenvolupador')";
        
        $conn->exec($consulta_videojoc);

        echo "Registro insertado correctamente.\n";
    } catch (PDOException $ex) {
        echo "Excepción capturada: " . $ex->getMessage() . "\n";
    }
}

$conn = null;
