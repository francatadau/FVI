<?php
include "lib/libros.php";
  $libritos= new Libros();
include "lib/seguridad.php";
  $seguridad = new Seguridad();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>brrr articulo</title>
	<link rel="stylesheet" href="css/test.css">
</head>
<body>
<?php
//si no hay usuario que entra, redirige a indeX, o si se entra de golpe....
if ($seguridad->getUsuario() == null) {
	header('Location: login.php');
}
	$nombre=$_GET['nombre'];
		if (isset($_GET["nombre"])) {
			$libritos->borrarLibros($_GET["nombre"]);
				header('Location: tusarticulos.php');
		}
			echo $nombre."<br>";

 echo "<a href=index.php>Ves a inicio</a>";
// echo "<a href='listaequipos.php'>Borrar mas Equipos</a>";
?>
</body>
</html>
