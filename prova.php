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

foreach ($data as $registro) {
    // Suponiendo que tienes un archivo JSON con campos específicos
    $nom = $registro['Nom'];
    $data_llancament = $registro['Llançament'];
   // var_dump($data_llancament);
    $pegi = $registro['pegi'];
    $id_desenvolupador = $registro['id_desenvolupador'];
    $id_plataforma = $registro['id_plataforma'];
    // Ejecutara consulta de inserción
    $consulta = "INSERT INTO videojoc (id, nom, data_llancament, pegi, id_desenvolupador, id_plataforma) VALUES (NULL, '$nom', '$data_llancament', NULL, NULL, NULL)";
}
    try {
        // ...
        if ($conn->query($consulta) === TRUE) {
            echo "Registro insertado correctamente.\n";
        } else {
            echo "Error al insertar el registro: " . $conn->error . "\n";
        }
    } catch (PDOException $ex) {
        echo "Excepción capturada: " . $ex->getMessage() . "\n";
    }


// Cerrar la conexión
$conn = null;

?>
