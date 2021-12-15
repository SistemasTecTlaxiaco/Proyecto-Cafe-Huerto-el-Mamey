<?php
/**
 * Buscar Modelo
 */
class BuscarModelo{
  private $db;
  
  function __construct()
  {
    $this->db = new database();
  }

  function getProductosBuscar($buscar){
    $sql = "SELECT * FROM productos WHERE ";
    $sql.= "nombre LIKE '%".$buscar."%' OR ";
    $sql.= "descripcion LIKE '%".$buscar."%' OR ";
    $sql.= "prov LIKE '%".$buscar."%'";
    //
    $data = $this->db->querySelect($sql);
    return $data; 
  }
}
?>