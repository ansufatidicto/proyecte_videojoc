<?php
//creamos la class
class genere {
// función para establecer conexion con la base de datos
  public function connectar_bd($servername, $username, $password)
  {
      try {
          $conn = new PDO("mysql:host=$servername;dbname=videojocs", $username, $password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          // echo "Connected successfully";
      } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }
      return $conn;
  }
// función para insertar datos dentrode la base de datos
public function inserir ($servername, $username, $password, $nom)
{
    $conn = $this->connectar_bd($servername,$username,$password);
      try
      {
        $sql = "INSERT INTO genere (id, nom) VALUES (NULL, '$nom');";
        //echo $sql;
        $conn->exec($sql); //ejecutamos la consulta sql en la abse de datos
        $last_id = $conn->lastInsertId();
} catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
  }
  $conn = null; //cierra conexión con la base de datos
}

// función para consultar por la id dentro de la base de datos
public function consultaTots($servername, $username, $password)
{
    $conn = $this->connectar_bd($servername, $username, $password);

    try {
        $stmt = $conn->prepare("SELECT * FROM genere");
        $stmt->execute();
        return $stmt;  // Devuelve el objeto PDOStatement
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {

        $conn = null;  // Cierra la conexión
    }
}

// función para eliminar datos dentrode la base de datos
function eliminar ($servername,$username,$password, $id)
{
  $conn = $this->connectar_bd($servername,$username,$password);

try {
  $sql = "DELETE FROM genere WHERE id='$id'";
  $conn->exec($sql); //ejecutamos la consulta sql en la abse de datos
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
}

function modificar ($servername,$username,$password, $id,$nom)
{
  $conn = $this->connectar_bd($servername,$username,$password);
  try {

    $sql = "UPDATE genere SET nom='$nom' WHERE id='$id'";

  $stmt = $conn->prepare($sql);
  $conn->exec($sql);
  echo $sql;
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;  // Cierra la conexión

}
// función para insertar datos en la tabla genere_videojoc dentro de la base de datos
public function inserirg($servername, $username, $password, $id_videojoc, $id_genere)
{
    $conn = $this->connectar_bd($servername, $username, $password);
    try {
      $sql = "INSERT INTO genere_videojoc (id_videojoc, id_genere) VALUES ('$id_videojoc', '$id_genere');";
      $conn->exec($sql);
      $last_id = $conn->lastInsertId();
  } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
  }
  
    $conn = null;
}
// función para consultar datos en la tabla genere_videojoc dentro de la base de datos
public function consultaTotsid_p ($servername, $username,$password)
{
    $conn = $this->connectar_bd($servername,$username,$password);

    try {
       $stmt = $conn->prepare("SELECT * FROM genere_videojoc");
       $result = $stmt->execute();
       $conn=null;
       return($stmt); 
    }

    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
}
}