<?php
//creamos la class
class desenvolupador {
// función para establecer conexion con la base de datos
  public function connectar_bd($servername, $username, $password)
  {
      try {
          $conn = new PDO("mysql:host=$servername;dbname=videojocs", $username, $password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
        $sql = "INSERT INTO desenvolupador (id, nom) VALUES (NULL, '$nom');";
        //echo $sql;
        // use exec() because no results are returned
        $conn->exec($sql); //ejecutamos la consulta sql en la abse de datos
        $last_id = $conn->lastInsertId();
} catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
  }
  $conn = null; //cierra conexión con la base de datos
}

// función para insertar datos dentrode la base de datos
public function consultaTots($servername, $username, $password)
{
    $conn = $this->connectar_bd($servername, $username, $password);

    try {
        $stmt = $conn->prepare("SELECT * FROM desenvolupador");
        $stmt->execute();
        return $stmt;  // Devuelve el objeto PDOStatement
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        // Cierra la conexión aquí después de realizar la consulta
        $conn = null; //cierra conexión con la base de datos
    }
}
// función para consultar por la id dentro de la base de datos
public function consultaid ($servername, $username,$password,$id)
{
    $conn = $this->connectar_bd($servername,$username,$password);

    try {
       $stmt = $conn->prepare("SELECT id FROM desenvolupador where id = '$id'");
       $result = $stmt->execute(); //ejecutamos la consulta sql en la abse de datos
       $conn=null; //cierra conexión con la base de datos
       return($stmt); 
    }

    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
}

// función para eliminar datos dentrode la base de datos
function eliminar ($servername,$username,$password, $id)
{
  $conn = $this->connectar_bd($servername,$username,$password);

try {
  $sql = "DELETE FROM desenvolupador WHERE id='$id'";
  $conn->exec($sql); //ejecutamos la consulta sql en la abse de datos
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null; //cierra conexión con la base de datos
}
// función para modificar datos dentrode la base de datos
function modificar ($servername,$username,$password, $id,$nom)
{
  $conn = $this->connectar_bd($servername,$username,$password);
  try {
    $sql = "UPDATE desenvolupador SET nom='$nom' WHERE id='$id'";

  $stmt = $conn->prepare($sql);
  // execute the query
  $conn->exec($sql); //ejecutamos la consulta sql en la abse de datos
  //echo $sql;
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage(); // imprime info de errores 
}
$conn = null; //cierra conexión con la base de datos
}
}
