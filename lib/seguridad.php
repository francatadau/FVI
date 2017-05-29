<?php

/**
 * Clase encargada del control de seguridad de la app,usuarios despues cookies
 */
class Seguridad{

  private $usuario=null;
  //viene el sesion start en el construct, despues genero funciones para aladir el usuario y poder entrar para despues hacer logout
  function __construct()
  {
    //Arrancamos la sesion
    session_start();
    if(isset($_SESSION["usuario"])) $this->usuario=$_SESSION["usuario"];
  }

  public function getUsuario(){
    return $this->usuario;
    echo $_SESSION["usuario"];
  }

  public function getId(){
  return $this->id_usuario;
  echo $_SESSION["id_usuario"];
}

  public function addUsuario($usuario,$id){
    $_SESSION["usuario"]=$usuario;
    $_SESSION["id_usuario"]=$id;
    $this->usuario=$usuario;
    $this->id_usuario=$id_usuario;
  }
  public function logOut(){
    $_SESSION=[];
    session_destroy();
  }

}
 ?>
