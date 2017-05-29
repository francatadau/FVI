<?php
  include 'lib/usuario.php';
  include 'lib/seguridad.php';

?>
 <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign Up & Login Form</title>

<link rel="stylesheet" href="css/login.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/login.js"></script>
    <script src="js/errorusuario.js"></script>
</head>

<body>

  <?php
  // error_reporting(0);
  $esErrorLogin=true;

  //En php llamamos desde index al campo accion del formulario==login, include de la clase+objeto
  if(isset($_POST["accion"])){
  		if ($_POST["accion"]=="login") {

  			$user=new usuario();
  			$seguridad = new Seguridad();

  	        $resultado=$user->buscarLogin($_POST["usuario"]);
  	        if($resultado!=null){
  	          //Comparamos los passwords     CON sha1 esta encriptado...
  	          if($resultado["pass"]==sha1($_POST["contr1"])){
  	          	//con esta funcion hace sesion start en miperfil.php
  	       		  $seguridad->addUsuario($_POST["usuario"]);
                $esErrorLogin==false;
  	            header('Location: index.php');
  	            // $seguridad->addUsuario($resultado["usuario"]);
  	          }else{

              }
  	        }
  	      }
  }
   ?>

  <div class="form-wrap">
		<div class="tabs">
			<h3 class="signup-tab"><a class="active" href="#signup-tab-content">Ingresar</a></h3>
			<h3 class="login-tab"><a href="#login-tab-content">Registrarse</a></h3>
		</div><!--.tabs-->

		<div class="tabs-content">
      <!-- ingresar -->
			<div id="signup-tab-content" class="active">
        <form class="" method="post" action="login.php">


          <input class="input" type="text" id="user" name="usuario" value="" placeholder="Usuario">

          <input class="input" type="password" name="contr1" value="" placeholder="Contraseña"><br><br>

          <input type="hidden" name="accion" value="login">

          <input class="button" type="submit" name="" value="Ingresar">
          <br>



        </form><!--.login-form-->


         <div id="erroru">
           <?php
            if(($esErrorLogin==true)&&(isset($_POST["accion"]))&&($_POST["accion"]=="login")) echo "<h2>ERROR</h2>";
            ?>
         </div>
			</div><!--.signup-tab-content-->

			<div id="login-tab-content">

        <?php
        if(isset($_POST["accion"])){

              $user=new usuario();
              //$seguridad = new Seguridad();
              //Registro de usuario buscamos registro, y decimos si no estan vacios los campos de post,ontraseñas
              if($_POST["accion"]=="registro"){
                if (!empty($_POST["usuario"]) && !empty($_POST["contr1"]) && !empty($_POST["email"]) && !empty($_POST["nombre"]) && !empty($_POST["apellidos"]) && !empty($_POST["telefono"]) && !empty($_POST["provincia"])) {
                  if($_POST["contr1"]==$_POST["contr2"]){
                    //se puede mejoar con un select de roles, que ataca o recoge la tabla roles en BD
                    $rol="usuario";
                    $resultado=$user->insertarUsuario($_POST["usuario"],$_POST["contr1"],$_POST["email"],$_POST["nombre"],$_POST["apellidos"],$_POST["provincia"],$rol,$_POST["telefono"]);
                    if($resultado!=null)
                    {
                      echo "<h2 class='succes'>Usuario registrado correctamente</h2></br>";
                      $resultado=$user->buscarUsuarioInsert($_POST["usuario"]);
                        foreach ($resultado as $key => $fila) {
                          echo "nombre : ".$fila["nombre"]."<br>";
                          echo "apellidos: ".$fila["apellidos"]."<br>";
                          echo "usuario : ".$fila["usuario"]."<br>";
                        }
                        echo "<a href=login.php>Ves a login</a>";
                    //no me muestra la informacion insertada porque me redirecciona a index.....+++
                    // header('Location: index.php');
                    }else{
                      //Usuario no insertado
                      echo "<h2 class='fail'>El usuario no ha sido insertado. Revisa los datos</h2></br>";
                      echo "<a href=registro.php>Ves a registro</a>";
                    }
                  }else{
                    //Contraseñas diferentes
                    echo "<h2>Las contraseñas no son iguales</h2></br>";
                    echo "<a href=registro.php>Ves a registro</a>";
                  }
                }else{
                  //Datos en blanco
                  header('Location: registro.php');
                }

              }
        }

        ?>
            <form  action="login.php" method="post">



                <input class="input" type="text" name="usuario" value="" required placeholder="Usuario">

                <input class="input" type="text" name="nombre" value="" required placeholder="Nombre"><br>

                <input class="input" type="password" name="contr1" value="" required placeholder="Contraseña">

                <input class="input" type="text" name="apellidos" value="" required placeholder="Apellidos"><br>

                <input class="input" type="password" name="contr2" value="" required placeholder="Confirmar Contraseña">

                <input class="input" type="text" name="provincia" value="" required placeholder="Provincia"><br>

                <input class="input"type="text" name="email" value="" required placeholder="Email">

                <input class="input"type="text" name="telefono" value="" required placeholder="Telefono"><br><br>



                <input type="hidden" name="accion" value="registro">
                <input class="buttone" type="submit" name="" value="registrarse">
            </form>
          <?php ?>


<!--.login-form-->
<!--.help-text-->
			</div><!--.login-tab-content-->
		</div><!--.tabs-content-->
	</div><!--.form-wrap-->


</body>
</html>
