<?php
class usuari {

  public function connectar_bd ($servername,$username,$password)
  {
    try {
      $conn = new PDO("mysql:host=$servername;dbname=videojocs", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed2: " . $e->getMessage();
    }
    return $conn;
}

public function inserir($servername, $username, $password, $nom, $contrasenya)
{
    // Conectar a la base de datos
    $conn = new PDO("mysql:host=$servername;dbname=videojocs", $username, $password);

    // Ejecutar la consulta
    $sql = "INSERT INTO usuaris (nom, contrasenya) VALUES ('$nom', '$contrasenya')";
    $conn->exec($sql);

    // Cerrar la conexión
    $conn = null;

    echo "Datos insertados correctamente.";
}




public function consultaTots ($servername, $username,$password,$nom,$contrasenya)
{
    $conn = $this->connectar_bd($servername,$username,$password);
    
    try {
        $sql="SELECT nom, contrasenya FROM usuaris WHERE nom='$nom' AND contrasenya='$contrasenya'";
       $stmt = $conn->prepare($sql);
       $result = $stmt->execute();
       echo "funciona";
       $conn=null;
       return($stmt); 
    }

    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
}
}