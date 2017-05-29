<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>


    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script>

      <script src="js/index5.js"></script>
<link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <?php

    //Archivo de conexión a la base de datos


    //Pedimos todos los datos
    $conexion = mysqli_connect("34.210.93.31", "administrador", "Grupo4flovei", "fvi");
    $consulta = mysqli_query($conexion, "SELECT m.nombre,m.descripcion,m.precio,m.etiqueta,m.imagen,u.usuario,u.telefono FROM mostrarTodos m,usuarios u WHERE m.id_usuario=u.id_usuario");
    $mensaje = "";

    //Mostramos los datos
    while($resultados = mysqli_fetch_array($consulta)) {
      $nombre = $resultados['nombre'];
      $descripcion = $resultados['descripcion'];
      $precio = $resultados['precio'];
      $etiqueta = $resultados['etiqueta'];
      $usuario = $resultados['usuario'];
      $telefono = $resultados['telefono'];



    	//Output
      $mensaje .='
      <article>
      <div class="card">
      ' . "<img src=".$resultados['imagen'].">".'
        <div class="card-title">
          <a href="javascript:;" class="toggle-info btn">
            <span class="left"></span>
            <span class="right"></span>
          </a>
          <h2>
              ' . $nombre . '
              <small> ' . $precio . ' €</small>
          </h2>
        </div>
        <div class="card-flap flap1">
          <div class="card-description">
            ' . $descripcion . '<br>

            <strong>Telefono:</strong> ' . $telefono . '<br>
          </div>
          <div class="card-flap flap2">
          <small style="padding-left: 10px;">
          <strong>Usuario:</strong> ' . $usuario . '<br>
          </small>
          <small style="position: absolute; right: 10px;">
          <strong>Etiqueta:</strong> ' . $etiqueta . '<br>
          </small>
            <div class="card-actions">

            </div>
          </div>
        </div>
        </div>
      </article>';
    };
    echo $mensaje;

    ?>

  </body>
</html>
