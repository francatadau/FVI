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



      <link rel="stylesheet" href="css/insertarArticulo.css">


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

                  	<p class="perfil">Insertar un articulo</p>
<?php

if(isset($_POST["accion"])){
	if($_POST["accion"]=="insertar"){
    if ($_POST["etiqueta"]=="electronica"){
      include "lib/electronica.php";
      $electro= new Electronica();
        if (!empty($_POST["nombre"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"]) && !empty($_POST["usuario"]) && !empty($_POST["etiqueta"])) {
          $tmp_name = $_FILES["imagen"]["tmp_name"];
          $name= basename($_FILES["imagen"]["name"]);
          $ruta="img/$name";
          move_uploaded_file($tmp_name, $ruta);
           $insercion=$electro->insertarArticulo($_POST["nombre"],$_POST["descripcion"],$_POST["precio"],$_POST["etiqueta"],$_POST["usuario"],$ruta);
         }
         }
         if ($_POST["etiqueta"]=="clases"){
           include "lib/clases.php";
           $clases2= new Clases();
             if (!empty($_POST["nombre"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"]) && !empty($_POST["usuario"]) && !empty($_POST["etiqueta"])) {
               $tmp_name = $_FILES["imagen"]["tmp_name"];
               $name= basename($_FILES["imagen"]["name"]);
               $ruta="img/$name";
               move_uploaded_file($tmp_name, $ruta);
                $insercion=$clases2->insertarClase($_POST["nombre"],$_POST["descripcion"],$_POST["precio"],$_POST["etiqueta"],$_POST["usuario"],$ruta);
              }
            }
              if ($_POST["etiqueta"]=="libros"){
                include "lib/libros.php";
                $libros2= new Libros();
                  if (!empty($_POST["nombre"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"]) && !empty($_POST["usuario"]) && !empty($_POST["etiqueta"])) {
                    $tmp_name = $_FILES["imagen"]["tmp_name"];
                    $name= basename($_FILES["imagen"]["name"]);
                    $ruta="img/$name";
                    move_uploaded_file($tmp_name, $ruta);
                     $insercion=$libros2->insertarLibro($_POST["nombre"],$_POST["descripcion"],$_POST["precio"],$_POST["etiqueta"],$_POST["usuario"],$ruta);
                   }
                 }
                if (!$insercion) {
                echo "Ha fallado la insercion";
                //recuperar de la bbdd
                  }else{
                  // echo "<b>Fecha: </b>".$fecha."<br>";
                  echo "<br><h3 style=' margin: 15px 15px 14px 26px; color: darkseagreen;'> ✓ Articulo insertado correctamente </h3></br>";
                    // echo $value["categoria"]."<br>";
                  }

                  // echo "<a href='actualizarArticulo.php?titulo=".$value["titulo"]."&subtitulo=".$value["subtitulo"]."&descripcion=".$value["descripcion"]."&categoria=".$value["categoria"]." '>Actualizar Articulo</a><br>";

                  // echo "<a href='borrarArticulo.php?titulo=".$value["titulo"]."'>Borrar Articulo</a><br>";
                  }
                }

if (empty($_POST)) {

?>
<section>
    <article class="parte2">
      <form action="insertarArticulo.php" method="post" enctype="multipart/form-data">
        <input class="inputp" type="hidden" name="usuario" value="<?=$usuario?>">
        <input class="inputp" type="text" name="nombre" value="" placeholder="Introduce un nombre" required><br>
         <input class="inputpd" type="text" name="descripcion" value="" placeholder="Introduce una descripcion" required><br>
       <!-- <textarea name="descripcion">


        </textarea><br> -->
        <input class="inputp" type="file" name="imagen" value="Elije archivo" placeholder="Introduce una imagen" required><br>

        <input class="inputp" type="text" name="precio" value="" placeholder="Introduce un precio" required><br>

        <select class="inputp" name="etiqueta">

          <option>Selecciona una etiqueta</option>
          <option>electronica</option>
          <option>clases</option>
          <option>libros</option>


        </select>


        <input type="hidden" name="accion" value="insertar">
        <input  class="buttone" type="submit" name="" value="insertar">

      </form>

    </article>
  </section>
 <?php } ?>
</body>


</html>
