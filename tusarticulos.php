<?php
include "lib/seguridad.php";
$seguridad = new Seguridad();
if ($seguridad->getUsuario() == null) {
  header('Location: login.php');
}

$user=$seguridad->getUsuario();
include 'lib/usuario.php';
$comprobar=new usuario();
$resultado=$comprobar->buscarLogin($user);
$usuario=$resultado['id_usuario'];
?>

<!DOCTYPE html>
  <html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Flovei Florida Venta e Intercambio</title>



      <link rel="stylesheet" href="css/miperfil.css">


    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800,900" rel="stylesheet">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
      <script src="js/index3.js"></script>
  </head>



  <body>

    <div class="wrapper">
      <!-- principio de la UI(Interfaz de usuario) -->
      <!-- Menu de la parte de arriba donde esta la barra de busqueda -->
      <div class="topmenu">
        <div class="logo">
          <a href='./index.php'> <p style='width: 230px; margin-top: 0px;'> Flovei <img class='iconlogo' src='img/logo2.png'></p>
        </div>
         <a class="showm" href="#null" id="showmenu"> <p class="showmn">≡</p></a>

      </div>

      <!-- Menu de la parte derecha -->

      <div class="side-menu">

        <div class="menu">
          <ul class="menu">
            <!-- Menu de usuario -->
        		<li class="item1"> <a href="#"><i class="fa fa-server" aria-hidden="true"> <img width="20px;" src="./img/iconos/usuario.png"> </i> <span class="text"><img width="25px;" src="./img/iconos/usuario.png">  <?=$seguridad->getUsuario()?></span></a>
        			<ul>
                <!-- Submenu de usuario -->
                <li><a href="./insertarArticulo.php"><i class="fa fa-bar-chart" aria-hidden="true"><img width="20px;" src="./img/iconos/subir.png"></i><span class="text"> Subir un articulo</span></a></li>
                <li><a href="./tusarticulos.php"><i class="fa fa-server" aria-hidden="true"><img width="20px;" src="./img/iconos/articulos.png"></i> <span class="text"> Mis articulos </span></a></li>
                <li><a href="./miperfil.php"><i class="fa fa-bar-chart" aria-hidden="true"><img width="20px;" src="./img/iconos/perfil.png"></i><span class="text"> Perfil</span></a></li>
                <form method="post" action="protegida.php">
                  <input type="hidden" name="accion" value="logout">
                  <a href="login.php"><i class="fa fa-server" aria-hidden="true"><img width="20px;" src="./img/iconos/cerrar.png"></i>
                  <span class="text"><input class="button" type="submit" value="Cerrar sesion"><span></a>
                </form>
        			</ul>
            </li>
          </ul>

          <!-- Menu de la parte derecha -->
<div class="menu">
  <ul>
            <li> <a href="./listarClases.php"><i class="fa fa-server" aria-hidden="true"> <img width="25px;" src="./img/iconos/profesor.png"> </i> <span class="text">  <img width="25px;" src="./img/iconos/profesor.png"> <big> Clases particulares</big> </span> </a> </li>
            <li> <a href="./listarLibros.php"><i class="fa fa-bar-chart" aria-hidden="true"> <img width="25px;" src="./img/iconos/libros.png"> </i> <span class="text">  <img width="25px;" src="./img/iconos/libros.png"> <big> Libros</big> </span> </a> </li>
            <li> <a href="./listarArticulos.php"><i class="fa fa-server" aria-hidden="true"> <img width="25px;" src="./img/iconos/Electronica.png"> </i> <span class="text"> <img width="25px;" src="./img/iconos/Electronica.png"> <big> Electronica </big></span> </a> </li>
  </ul>
</div>

            </li>
          </ul>
        </div>
      </div>

        <div class="main-section">

                <div class="productsRow">
  <?php
require_once 'lib/electronica1.php';
  $tusarticulos = new Electronica();
  $resultado = $tusarticulos->mostrarElec($usuario);
  foreach ($resultado as $fila) {
    echo "<br>";
    echo "<article>";
    echo "<div class='card'>";
    echo "<img width='250' height='100' src='".$fila['imagen']."'><br>";
    echo "<b>Nombre: </b>".$fila['nombre']."<br>";
    echo "<b>Precio: </b>".$fila['precio']."<br>";
    echo "<b>Descripcion: </b>".$fila['descripcion']."<br>";
    echo "<b>Etiqueta: </b>".$fila['etiqueta']."<br><br> ";
    echo "<a href='updateArticulo.php?nombre=".$fila["nombre"]."&descripcion=".$fila["descripcion"]."&precio=".$fila["precio"]." '> <img width='45px' src='./img/iconos/editar.png'></a>";
	  echo "<a href='borrarArticulo.php?nombre=".$fila["nombre"]."'><img style='width:45px;' align='right' src='./img/iconos/borrar.png'></a><br>";
    echo "</div>";
    echo "</article>";
  }
  ?>

  <?php
require_once 'lib/clases1.php';
  $tusclases = new Clases();
  $resultado = $tusclases->mostrarClases($usuario);
  foreach ($resultado as $fila) {
    echo "<br>";
    echo "<article>";
    echo "<div class='card'>";
    echo "<img width='250' height='100' src='".$fila['imagen']."'><br>";
    echo "<b>Nombre: </b>".$fila['nombre']."<br>";
    echo "<b>Precio: </b>".$fila['precio']."<br>";
    echo "<b>Descripcion: </b>".$fila['descripcion']."<br>";
    echo "<b>Etiqueta: </b>".$fila['etiqueta']."<br><br> ";
    echo "<a href='updateClases.php?nombre=".$fila["nombre"]."&descripcion=".$fila["descripcion"]."&precio=".$fila["precio"]." '> <img width='45px' src='./img/iconos/editar.png'></a>";
	  echo "<a href='borrarClases.php?nombre=".$fila["nombre"]."'><img style='width:45px;' align='right' src='./img/iconos/borrar.png'></a><br>";
    echo "</div>";
    echo "</article>";

  }
  ?>

  <?php
require_once 'lib/libros1.php';
  $tuslibros = new Libros();
  $resultado = $tuslibros->mostrarLibros($usuario);
  foreach ($resultado as $fila) {
    echo "<br>";
    echo "<article>";
    echo "<div class='card'>";
    echo "<img width='250' height='100' src='".$fila['imagen']."'><br>";
    echo "<b>Nombre: </b>".$fila['nombre']."<br>";
    echo "<b>Precio: </b>".$fila['precio']."<br>";
    echo "<b>Descripcion: </b>".$fila['descripcion']."<br>";
    echo "<b>Etiqueta: </b>".$fila['etiqueta']."<br><br> ";
    echo "<a href='updateLibros.php?nombre=".$fila["nombre"]."&descripcion=".$fila["descripcion"]."&precio=".$fila["precio"]." '> <img width='45px' src='./img/iconos/editar.png'></a>";
	  echo "<a href='borrarLibros.php?nombre=".$fila["nombre"]."'><img style='width:45px;' align='right' src='./img/iconos/borrar.png'></a><br>";
    echo "</div>";
    echo "</article>";
  }
  ?>

</div>
</div>

</body>
</html>
