<?php
/**
 * Manejo de la base de datos MySQL
 */
class database{
  private $host = "s465z7sj4pwhp7fn.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306";
  private $usuario = "t6ifn1fr49l3ewz5";
  private $clave = "zkkjzyuellc5jj1r"; 
  private $db = "surfm828igg54h37";
  private $puerto = "";
  private $conn;
  
  function __construct()
  {
    $this->conn = mysqli_connect($this->host, 
      $this->usuario, 
      $this->clave,
      $this->db);

    if (mysqli_connect_errno()) {
      printf("Error en la conexión a la base de datos %s",
      mysqli_connect_errno());
      exit();
    } else {
      //print "Conexión exitosa"."<br>";
    }

    if (!mysqli_set_charset($this->conn, "utf8mb4")) {
      printf("Error en la conversión de caracteress %s",
      mysqli_connect_error());
      exit();
    } else {
    }
  } 

  //Query regresa un solo registro en un arreglo asociado
  function query($sql){
    $data = array();
    $r = mysqli_query($this->conn, $sql);
    if($r){
      if(mysqli_num_rows($r)>0){
        $data = mysqli_fetch_assoc($r);
      }
    }
    return $data;
  }

  function querySelect($sql){
    $data = array();
    $r = mysqli_query($this->conn, $sql);
    if($r){
      while($row = mysqli_fetch_assoc($r)){
        array_push($data, $row);
      }
    }
    return $data;
  }

  //Query regresa un valor booleano
  function queryNoSelect($sql){
    $r = mysqli_query($this->conn, $sql);
    return $r;
  }

  public function cerrar()
  {
    mysqli_close($this->conn);
  }
}
?>