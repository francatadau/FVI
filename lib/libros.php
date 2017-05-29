<?php
include_once "db.php";
/**
 *
 */
class Libros extends db{

  private $error=false;
  private $error_msj="";

  function __construct()
  {
    //De esta forma realizamos la conexion a la base de datos
    parent::__construct();
  }
    //Devolvemos todos los usuarios SDEVUELVE TABLA ARRAY ASOCIATIVO, CON ITERATORS PUEDES HACER RETURN DE $RESULTADO Y CON FOREACH MOSTRAR....   adaptar
  // function devolverArticulos(){

    function devolverTodosLibros(){
    if($this->error==false){
      $sql="SELECT l.nombre,l.descripcion,l.imagen,l.precio,l.etiqueta,u.usuario,u.telefono from libros l,usuarios u WHERE l.id_usuario=u.id_usuario";
        return $resultado=$this->realizarConsulta($sql);
     }else{
       $this->error_msj="Imposible realizar la consulta: ".$consulta;
        return null;
      }
  }

  function devolverLibros($nombre){
    if($this->error==false){
      $sql="SELECT * from libros WHERE nombre='".$nombre."'";
        return $resultado=$this->realizarConsulta($sql);
     }else{
       $this->error_msj="Imposible realizar la consulta: ".$consulta;
        return null;
      }
  }

  public function actualizarLibros($nombre,$descripcion,$precio,$etiqueta,$imagen){
    $sqlActualizar="UPDATE libros SET nombre='".$nombre."',descripcion='".$descripcion."',imagen='".$imagen."',precio='".$precio."',etiqueta='".$etiqueta."' WHERE nombre='".$nombre."' ";
       return $resultado=$this->realizarConsulta($sqlActualizar);
  }

  public function borrarLibros($nombre){
  $deleteSql="DELETE FROM libros WHERE nombre='".$nombre."' ";
    return $resultado=$this->realizarConsulta($deleteSql);
  // $this->conexion->query($deleteSql);
 }


  public function mostrarLibros($usuario){
    if($this->error==false){
      $sql="SELECT m.nombre,m.descripcion,m.imagen,m.precio,m.etiqueta from libros m,usuarios u WHERE m.id_usuario=u.id_usuario AND u.id_usuario='".$usuario."'";
        return $resultado=$this->realizarConsulta($sql);
     }else{
       $this->error_msj="Imposible realizar la consulta: ".$consulta;
        return null;
      }
}
  //faltan control de errores etc.. diferentes casos asi es bruto?...
  public function insertarLibro($nombre,$descripcion,$precio,$etiqueta,$usuario,$img){
    $sqlInsercion="INSERT INTO libros(id_libro,nombre,descripcion,precio,etiqueta,id_usuario,imagen)Values(NULL,'".$nombre."','".$descripcion."','".$precio."','".$etiqueta."','".$usuario."','".$img."')";
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
