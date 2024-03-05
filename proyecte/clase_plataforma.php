<html>
<?php
class plataforma {

  public function connectar_bd ($servername,$username,$password)
  {
    try {
      $conn = new PDO("mysql:host=$servername;dbname=videojocs", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      echo "Connection failed2: " . $e->getMessage();
    }
    return $conn;
}
public function inserir ($servername, $username, $password, $nom)
{
    $conn = $this->connectar_bd($servername,$username,$password);
      try
      {
        $sql = "INSERT INTO plataforma (id, nom) VALUES (NULL, '$nom');";
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
} catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
  }
  $conn = null;
}


public function consultaTots ($servername, $username,$password)
{
    $conn = $this->connectar_bd($servername,$username,$password);

    try {
       $stmt = $conn->prepare("SELECT * FROM plataforma");
       $result = $stmt->execute();
       $conn=null;
       return($stmt); 
    }

    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
}

function modificar ($servername,$username,$password, $id,$nom)
{
  $conn = $this->connectar_bd($servername,$username,$password);
  try {

    $sql = "UPDATE plataforma SET nom='$nom' WHERE id='$id'";

  $stmt = $conn->prepare($sql);

  $conn->exec($sql);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

}

function eliminar ($servername,$username,$password, $id)
{
  $conn = $this->connectar_bd($servername,$username,$password);

try {

  $sql = "DELETE FROM plataforma WHERE id='$id'";

  $conn->exec($sql);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
}
// función para insertar datos en la tabla plataforma_videojoc dentro de la base de datos
public function inserirg($servername, $username, $password, $id_videojoc, $id_plataforma)
{
    $conn = $this->connectar_bd($servername, $username, $password);
    try {
      $sql = "INSERT INTO plataforma_videojoc (id_videojoc, id_plataforma) VALUES ('$id_videojoc', '$id_plataforma');";
      $conn->exec($sql);
      $last_id = $conn->lastInsertId();
  } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
  }
  
    $conn = null;
}
// función para consultar datos en la tabla plataforma_videojoc dentro de la base de datos
public function consultaTotsid_p ($servername, $username,$password)
{
    $conn = $this->connectar_bd($servername,$username,$password);

    try {
       $stmt = $conn->prepare("SELECT * FROM plataforma_videojoc");
       $result = $stmt->execute();
       $conn=null;
       return($stmt); 
    }
    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
}
}