<?php
include "lib/usuario.php";
$user=new usuario();
include "lib/seguridad.php";
$seguridad = new Seguridad();
if ($seguridad->getUsuario() == null) {
  header('Location: login.php');
}
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

	<p class="perfil">Perfil de Usuario</p>
  <?php
  //si no hay usuario que entra, redirige a indeX, o si se entra de golpe....
  if ($seguridad->getUsuario() == null) {
  	header('Location: login.php');
  }
  if(isset($_POST["accion"])){
  	if ($_POST["accion"]=="actualizar") {
  		$resultado=$user->actualizarUsuario($_POST['email'],$_POST['nombre'],$_POST['apellidos'],$_POST['telefono']);
  		  if($resultado!=null){
              echo "<h3 style=' margin: 5px 15px 14px 26px; color: darkseagreen;'> ✓ Usuario actualizado correctamente </h3>";
  		   }else{
  		        echo "<h2>usuario no actualizado</h2></br>";
  		    }
  		}
  }
  //preparamos para recoger los datos en el formulario de actualizar
  $resultado = $user->buscarUsuario($seguridad->getUsuario());
  	if ($resultado != false) {
  		$data=[];
  		foreach ($resultado as $key => $fila) {
  		        $data=$fila;
  		}
  	}

  ?>
<form  class="formpu" action="miperfil.php" method="post">

        <label>Nombre</label> <label style="margin-left: 30%">Apellidos</label><br>
        <input class="inputp" type="text" name="nombre" value="<?php echo $data['nombre']; ?>" required readonly>
        <input class="inputp" type="text" name="apellidos" value="<?php echo $data['apellidos']; ?>"  required><br><br>
        <label>Email</label> <label style="margin-left: 30%">Teléfono</label><br>
        <input class="inputp" type="email" name="email" value="<?php echo $data['email']; ?>"  required>
				<input class="inputp" type="telefono" name="telefono" value="<?php echo $data['telefono']; ?>"  required><br><br>
        <input type="hidden" name="accion" value="actualizar">
        <input class="buttone" type="submit" name="" value="actualizar">

</form>

		</div>
  </div>
		</body>
	</html>
