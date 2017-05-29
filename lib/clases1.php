<?php
include_once "db.php";
/**
 *
 */
class Clases extends db{

  private $error=false;
  private $error_msj="";

  function __construct()
  {
    //De esta forma realizamos la conexion a la base de datos
    parent::__construct();
  }
    //Devolvemos todos los usuarios SDEVUELVE TABLA ARRAY ASOCIATIVO, CON ITERATORS PUEDES HACER RETURN DE $RESULTADO Y CON FOREACH MOSTRAR....   adaptar
  // function devolverArticulos(){

  function devolverTodasClases(){
    if($this->error==false){
      $sql="SELECT c.nombre,c.descripcion,c.imagen,c.precio,c.etiqueta,u.usuario,u.telefono from clases c,usuarios u WHERE c.id_usuario=u.id_usuario";
        return $resultado=$this->realizarConsulta($sql);
     }else{
       $this->error_msj="Imposible realizar la consulta: ".$consulta;
        return null;
      }
  }

  function devolverClases($nombre){
    if($this->error==false){
      $sql="SELECT * from clases WHERE nombre='".$nombre."'";
        return $resultado=$this->realizarConsulta($sql);
     }else{
       $this->error_msj="Imposible realizar la consulta: ".$consulta;
        return null;
      }
  }

  public function mostrarClases($usuario){
    if($this->error==false){
      $sql="SELECT m.nombre,m.descripcion,m.imagen,m.precio,m.etiqueta from clases m,usuarios u WHERE m.id_usuario=u.id_usuario AND u.id_usuario='".$usuario."'";
        return $resultado=$this->realizarConsulta($sql);
     }else{
       $this->error_msj="Imposible realizar la consulta: ".$consulta;
        return null;
      }
}

public function actualizarClases($nombre,$descripcion,$precio,$etiqueta,$imagen){
  $sqlActualizar="UPDATE clases SET nombre='".$nombre."',descripcion='".$descripcion."',imagen='".$imagen."',precio='".$precio."',etiqueta='".$etiqueta."' WHERE nombre='".$nombre."' ";
     return $resultado=$this->realizarConsulta($sqlActualizar);
}

public function borrarClases($nombre){
$deleteSql="DELETE FROM clases WHERE nombre='".$nombre."' ";
  return $resultado=$this->realizarConsulta($deleteSql);
// $this->conexion->query($deleteSql);
}

  //faltan control de errores etc.. diferentes casos asi es bruto?...
  public function insertarClase($nombre,$descripcion,$precio,$etiqueta,$usuario,$img){
    $sqlInsercion="INSERT INTO clases(id_clase,nombre,descripcion,precio,etiqueta,id_usuario,imagen)Values(NULL,'".$nombre."','".$descripcion."','".$precio."','".$etiqueta."','".$usuario."','".$img."')";
        if($this->realizarConsulta($sqlInsercion)){
          return true;
        }else{
          return false;
         }
  }

  /*public function borrarClase($nombre){
$deleteSql="DELETE FROM clases WHERE nombre='".$nombre."' ";
return $resultado=$this->realizarConsulta($deleteSql);
// $this->conexion->query($deleteSql);
}*/



  // function devolverEventosInsert($titulo){
  //   if($this->error==false){
  //     $sql="SELECT * from eventos WHERE titulo='".$titulo."' ";
  //       return $resultado=$this->realizarConsulta($sql);
  //    }else{
  //      $this->error_msj="Imposible realizar la consulta: ".$consulta;
  //       return null;
  //     }
  // }


// public function actualizarEvento($titulo,$subtitulo,$descripcion,$categoria,$fecha,$imagen){
//     $sqlActualizar="UPDATE eventos SET titulo='".$titulo."',subtitulo='".$subtitulo."',descripcion='".$descripcion."',categoria='".$categoria."',fecha='".$fecha."',imagen='".$imagen."' WHERE titulo='".$titulo."'  ";
//      return $resultado=$this->realizarConsulta($sqlActualizar);
//   }


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
