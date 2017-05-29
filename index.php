<?php
include "lib/usuario.php";
$user=new usuario();
include "lib/seguridad.php";
$seguridad = new Seguridad();
if ($seguridad->getUsuario() == null) {
  header('Location: login.php');
}
include "lib/clases.php";
$clase= new Clases();
include "lib/libros.php";
$libro= new Libros();
include "lib/electronica.php";
$elec= new Electronica();


?>

<?php
if ($seguridad->getUsuario()==null) {
  ?>
  <button type="button" onclick="location.href='login.php'">ves a login</button>
<?php
}else{


  ?>

  <?php
  if(isset($_POST["accion"])){
    if ($_POST["accion"]=="logout") {
    $seguridad->logOut();
    echo "<h2>LogOut, sesion cerrada</h2></br>";
    echo "<a href=index.php>Sal y vuelve al principio</a>";
    }
  }
  }
  ?>

<!DOCTYPE html>
  <html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Flovei Florida Venta e Intercambio</title>



      <link rel="stylesheet" href="css/style.css">


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
        <div class="search"> <form accept-charset="utf-8" method="POST">
        <input type="text" name="busqueda" id="busqueda" value="" class='src' placeholder='Buscar articulos...' maxlength="50" autocomplete="off" onKeyUp="buscar();" />
        </form>


</div>
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
<!-- Final del la UI (Interfaz de usuario) -->

<!-- Contenido principal (Articulos, Formulario, etc...) -->

      <div class="main-content">


<div class="main-section">


        <div class="productsRow">
      <br><br><br>


<!-- Div que llama a la funcion de mostrar articulos -->
      <div class="cards" id="resultadoBusqueda">


    </div>

      </div>
    </div>
  </div>



<br><br><br><br>
  </body>

</html>
