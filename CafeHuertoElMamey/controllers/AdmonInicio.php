<?php
/**
 * Controlador Loginn de vistas
 */
class AdmonInicio extends Controlador{
  private $modelo;

  function __construct()
  {
    $this->modelo = $this->modelo("AdmonInicioModelo");
  }

  function caratula(){
    //Creamos sesion
    $sesion = new Sesion();

    if($sesion->getLogin()){
      $datos = [
        "titulo" => "Administrativos | inicio",
        "menu" => false,
        "admon" => true,
        "data" => []
      ];
      $this->vista("AdmonInicioVista",$datos);
    } else {
      header("location:".URL."admin");
    }
  }

}
?>
