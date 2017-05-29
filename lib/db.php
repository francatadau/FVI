<?php
    class db{
      //-- Variables de Identificacion --\\
      private $ip="34.210.93.31";
      private $usuario="administrador";
      private $contraseña="Grupo4flovei";
      private $db="fvi";
      //conexion objeto atacar bbdd, control de errores....
      protected $conexion;

      private $error=false;
      private $error_msj="";

      function __construct(){
        $this->conexion = new mysqli($this->ip, $this->usuario, $this->contraseña,$this->db);
        if ($this->conexion->connect_errno){
          $this->error=true;
        }
      }


      public function getErrorConexion(){
        return $this->error;
      }
      function msjError(){
      return $this->error_msj;
      }
      //funcion realizar query hereda clae hija...
      public function realizarConsulta($consulta){
        if($this->error==false){
          return $resultado = $this->conexion->query($consulta);
        }else{
          $this->error_msj="Imposible realizar la consulta: ".$consulta;
          return null;
        }
      }

 }
 ?>
