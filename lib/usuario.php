<?php
include "db.php";
/**
*
*/
class usuario extends db{

	function __construct()
	{
		parent::__construct();
	}
	//compruebas si existe usuario e email...revisar para examen no conflictos plzz o cambbiarlo...
	public function insertarUsuario($usuario,$pass,$email,$nombre,$apellidos,$provincia,$rol="usuario",$telefono){
		if($this->buscarUsuario($usuario) != false){
	   		echo "Existe un usuario con este nombre de usuario";
			return false;
		}
		if ($this->checkearEmail($email)) {
			echo "Existe un usuario con este email";
			return false;
		}
	  $sqlInsercion="INSERT INTO usuarios(id_usuario,usuario,pass,email,nombre,apellidos,provincia,rol,telefono) Values(NULL,'".$usuario."','".sha1($pass)."','".$email."','".$nombre."','".$apellidos."','".$provincia."','".$rol."','".$telefono."' )";
	     $resultado=$this->realizarConsulta($sqlInsercion);
	     if ($resultado!=null) {
	     	return true;
	     }else{
	     	return false;
	     }
	}
	//puede que algunas de estas esten repetidas mañana lo vemos
	public function checkearEmail($email){
	  $sqlInsercion="SELECT * FROM usuarios WHERE email='".$email."'";
	     $resultado=$this->realizarConsulta($sqlInsercion);
	     if ($resultado->num_rows != null) {
	     	return true;
	     }else{
	     	return false;
	     }
	}

	function buscarUsuario($user){
	    //Construimos la consulta
	    $sql="SELECT * from usuarios WHERE usuario='".$user."'";
	    //Realizamos la consulta
	    $resultado = $this->realizarConsulta($sql);
	    if ($resultado->num_rows != null) {
	     	return $resultado;
	     }else{
	     	return false;
	     }
	}

	function buscarLogin($usuario){
	    //Construimos la consulta  OPCION CON fetch_assoc     devuelve objeto mysqli
	    $sql="SELECT * from usuarios WHERE usuario='".$usuario."'";
	    //Realizamos la consulta
	    $resultado=$this->realizarConsulta($sql);
	    if($resultado!=false){
	        return $resultado->fetch_assoc();
	    }else{
	        return null;
	      }
  	}
  	//funcion on return directo, para luego poder recorrer cn foreach... con where filtrado O SINN FILTRAR
  	function buscarUsuarioInsert($usuario){
	    $sql="SELECT * from usuarios WHERE usuario='".$usuario."'";
			return $resultado=$this->realizarConsulta($sql);
	}

	function buscarUsuario2($usuario){
		$sql="SELECT * from usuarios WHERE usuario='".$_SESSION["usuario"]."'";
		return $resultado=$this->realizarConsulta($sql);
}

	public function actualizarUsuario($email,$nombre,$apellidos,$telefono){
  		$sqlActualizar="UPDATE usuarios SET email='".$email."',nombre='".$nombre."',apellidos='".$apellidos."',telefono='".$telefono."' WHERE nombre='".$nombre."' ";
  			return $resultado=$this->realizarConsulta($sqlActualizar);
  	}
  	// public function actualizarUsuario($nombre,$apellidos,$email){
  	// 	$sqlActualizar="UPDATE usuarios SET nombre='".$nombre."',apellidos='".$apellidos."',email='".$email."' WHERE usuario='".$usuario."' ";
  	// 		return $resultado=$this->realizarConsulta($sqlActualizar);
  	// }


  	//Muchas funciones desde el principio, borrar despues de examen xd;

	// public function actualizarEquipo($codigo,$nombre,$procedencia,$altura,$peso,$posicion,$Nombre_equipo){
	// 	$sqlActualizar="UPDATE jugadores SET codigo='".$codigo."',Nombre='".$nombre."',Procedencia='".$procedencia."',Altura='".$altura."',Peso='".$peso."',Posicion='".$posicion."',Nombre_equipo='".$Nombre_equipo."' WHERE codigo='".$codigo."' ";
	// 	$this->conexion->query($sqlActualizar);
	// }

	// public function borrarJugador($codigo){
	//   $deleteSql="DELETE FROM jugadores WHERE codigo='".$codigo."' ";
	//   	$this->conexion->query($deleteSql);
	// }

	// public function devolverUltimoUsuario($codigo){
	//   $sql="SELECT * FROM jugadores WHERE codigo = '".$codigo."' ";
	//     return $resultado=$this->realizarConsulta($sql);
	// }

	// public function devolverJugador(){
	// 	$sql="SELECT * FROM jugadores";
	// 	return $resultado=$this->realizarConsulta($sql);
	// }

	// public function SelectEquipoLocal(){
 //    	return $this->conexion->query("SELECT distinct(Nombre) FROM equipos  GROUP BY Nombre ASC");
 //  	}
}
?>
