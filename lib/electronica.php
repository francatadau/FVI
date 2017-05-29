<?php
include_once "db.php";
/**
 *
 */
class Electronica extends db{

  private $error=false;
  private $error_msj="";

  function __construct()
  {
    //De esta forma realizamos la conexion a la base de datos
    parent::__construct();
  }
    //Devolvemos todos los usuarios SDEVUELVE TABLA ARRAY ASOCIATIVO, CON ITERATORS PUEDES HACER RETURN DE $RESULTADO Y CON FOREACH MOSTRAR....   adaptar
  // function devolverArticulos(){





    function devolverTodosArticulos(){
    if($this->error==false){
      $sql="SELECT e.nombre,e.descripcion,e.imagen,e.precio,e.etiqueta,u.usuario,u.telefono from electronica e,usuarios u WHERE e.id_usuario=u.id_usuario";
        return $resultado=$this->realizarConsulta($sql);
     }else{
       $this->error_msj="Imposible realizar la consulta: ".$consulta;
        return null;
      }
  }

  public function mostrarElec($usuario){
    if($this->error==false){
      $sql="SELECT m.nombre,m.descripcion,m.imagen,m.precio,m.etiqueta from electronica m,usuarios u WHERE m.id_usuario=u.id_usuario AND u.id_usuario='".$usuario."'";
        return $resultado=$this->realizarConsulta($sql);
     }else{
       $this->error_msj="Imposible realizar la consulta: ".$consulta;
        return null;
      }
}


  function devolverArticulos($nombre){
    if($this->error==false){
      $sql="SELECT * from electronica WHERE nombre='".$nombre."'";
        return $resultado=$this->realizarConsulta($sql);
     }else{
       $this->error_msj="Imposible realizar la consulta: ".$consulta;
        return null;
      }
  }
  //faltan control de errores etc.. diferentes casos asi es bruto?...
  public function insertarArticulo($nombre,$descripcion,$precio,$etiqueta,$usuario,$img){
    $sqlInsercion="INSERT INTO electronica(id_electronica,nombre,descripcion,precio,etiqueta,id_usuario,imagen)Values(NULL,'".$nombre."','".$descripcion."','".$precio."','".$etiqueta."','".$usuario."','".$img."')";
        if($this->realizarConsulta($sqlInsercion)){
          return true;
        }else{
          return false;
         }
  }



  // function devolverEventosInsert($titulo){
  //   if($this->error==false){
  //     $sql="SELECT * from eventos WHERE titulo='".$titulo."' ";
  //       return $resultado=$this->realizarConsulta($sql);
  //    }else{
  //      $this->error_msj="Imposible realizar la consulta: ".$consulta;
  //       return null;
  //     }
  // }


  public function actualizarArticulo($nombre,$descripcion,$precio,$etiqueta,$imagen){
    $sqlActualizar="UPDATE electronica SET nombre='".$nombre."',descripcion='".$descripcion."',imagen='".$imagen."',precio='".$precio."',etiqueta='".$etiqueta."' WHERE nombre='".$nombre."' ";
       return $resultado=$this->realizarConsulta($sqlActualizar);
  }

  public function borrarArticulo($nombre){
  $deleteSql="DELETE FROM electronica WHERE nombre='".$nombre."' ";
    return $resultado=$this->realizarConsulta($deleteSql);
  // $this->conexion->query($deleteSql);
 }


  //PLANTILLAS PARA REALIZAR CODIGO DEL PROYECTO NTEGRADO, FVI VENTA E INTERCAMBIO....CRUD+LOGIN

  // public function borrarEvento($titulo){
  //   $deleteSql="DELETE FROM eventos WHERE titulo='".$titulo."'";
  //     if($this->realizarConsulta($deleteSql)){
  //       return true;
  //     }else{
  //       return false;
  //     }
  // }


// public function aztualizarNoticia($titulo,$subtitulo,$descripcion,$categoria,$fecha,$imagen){
//   $sqlActualizar="UPDATE eventos SET titulo='".$titulo."',subtitulo='".$subtitulo."',descripcion='".$descripcion."' WHERE Nombre='".$nombre."' ";
//       $this->conexion->query($sqlActualizar);
// }


// public function devolverUltimoEquipo($equipo){
//   $sql="SELECT * FROM equipos WHERE Nombre = '".$equipo."'";
//     $resultado=$this->realizarConsulta($sql);
//       $tabla=[];
//         $fila=$resultado->fetch_assoc();
//           $tabla[]=$fila;
//     return $tabla;
// }



// public function borrarEquipo($nombre){
//   $deleteSql="DELETE FROM equipos WHERE Nombre='".$nombre."' ";
//    $this->conexion->query($deleteSql);
// }

}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script>

      <script src="js/index5.js"></script>
  </head>
  <body>

  </body>
</html>
